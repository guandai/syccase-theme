from PIL import Image, ExifTags
import os

INPUT_FOLDER = "images"
OUTPUT_FOLDER = "output"
CANVAS_SIZE = (1800, 1200)
BG_COLOR = (0, 0, 0)  # Black background

# Apply EXIF orientation correctly
def apply_exif_orientation(img):
    try:
        exif = img._getexif()
        if exif is not None:
            for key, val in ExifTags.TAGS.items():
                if val == 'Orientation':
                    orientation_key = key
                    break
            orientation = exif.get(orientation_key)
            if orientation == 3:
                img = img.rotate(180, expand=True)
            elif orientation == 6:
                img = img.rotate(270, expand=True)
            elif orientation == 8:
                img = img.rotate(90, expand=True)
    except Exception:
        pass
    return img

def resize_and_center(image_path, output_path):
    img = Image.open(image_path)
    img = apply_exif_orientation(img).convert("RGB")

    img_width, img_height = img.size
    canvas_width, canvas_height = CANVAS_SIZE
    img_ratio = img_width / img_height
    canvas_ratio = canvas_width / canvas_height

    # Resize proportionally
    if img_ratio > canvas_ratio:
        new_width = canvas_width
        new_height = int(new_width / img_ratio)
    else:
        new_height = canvas_height
        new_width = int(new_height * img_ratio)

    resized_img = img.resize((new_width, new_height), Image.LANCZOS)

    # Create canvas and center the image
    canvas = Image.new("RGB", CANVAS_SIZE, BG_COLOR)
    offset = ((canvas_width - new_width) // 2, (canvas_height - new_height) // 2)
    canvas.paste(resized_img, offset)
    canvas.save(output_path, format="JPEG", quality=95)
    print(f"✅ Saved: {output_path}")

def process_folder(input_folder, output_folder):
    os.makedirs(output_folder, exist_ok=True)
    for filename in os.listdir(input_folder):
        if filename.lower().endswith((".jpg", ".jpeg", ".png")):
            input_path = os.path.join(input_folder, filename)
            output_path = os.path.join(output_folder, os.path.splitext(filename)[0] + ".jpg")
            resize_and_center(input_path, output_path)

# Run it
process_folder(INPUT_FOLDER, OUTPUT_FOLDER)
