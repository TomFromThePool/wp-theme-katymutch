<?php get_header(); ?>
<div id="content">
<h1 class="page-title"><?php _e( 'Category: ', 'blankslate' ) ?> <span><?php single_cat_title() ?></span></h1>
<div class="summary-container">
<?php the_post(); ?>
<?php rewind_posts(); ?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<?php } ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class("multi-post-summary"); ?>>
<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
<div class="entry-summary">
<?php the_post_thumbnail(); ?>
</div>
<h2 class="entry-title"><?php the_title(); ?></h2>
</a>
</div>
<?php endwhile; ?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-below" class="paginated-navigation">
	<?php wp_paginate(); ?>
</div>
<?php } ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>