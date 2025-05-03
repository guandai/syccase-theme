document.addEventListener("DOMContentLoaded", function () {
  console.log(`1234`);
  const ul = document.querySelector("syccase-shop-products ul.wp-block-post-template");
  if (!ul) return;
  console.log(`123432`);
  const items = Array.from(ul.querySelectorAll("li"));

  // Helper to extract the first tag slug from class list
  function getFirstTag(li) {
    console.log(`12343211`, li);
      const classes = li.className.split(/\s+/);
      const tagClass = classes.find(c => c.startsWith('product_tag-'));
      return tagClass ? tagClass.replace('product_tag-', '').toLowerCase() : '';
  }

  // Sort items based on extracted tag slug
  items.sort((a, b) => {
      const tagA = getFirstTag(a);
      const tagB = getFirstTag(b);
      return tagA.localeCompare(tagB);
  });

  // Reorder the <ul>
  ul.innerHTML = "";
  items.forEach(item => ul.appendChild(item));
});
