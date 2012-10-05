<?php get_header(); ?>
<article id="content" class="about">
<?php the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content">
<div class="featured-image-container">
<?php the_post_thumbnail(); ?>
</div><?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
<?php edit_post_link( __( 'Edit', 'blankslate' ), '<span class="edit-link">', '</span>' ) ?>
</div>
</div>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>