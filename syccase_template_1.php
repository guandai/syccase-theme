<?php
/*
Template Name: Syc Case Template
Description: A custom syc case template for displaying a unique layout.
*/

get_header();  // Include the header

?>

<div class="custom-template-content">
    <h1>Welcome to My Custom Template</h1>

    <?php
    if (have_posts()) : 
        while (have_posts()) : the_post();
            echo '<div class="post-content">';
            the_content();  // Display the page content
            echo '</div>';
        endwhile;
    endif;
    ?>
</div>

<?php
get_footer();  // Include the footer
?>
