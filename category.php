<?php get_header(); ?>
<div id="content">
<h1 class="page-title"><?php _e( 'Category: ', 'blankslate' ) ?> <span><?php single_cat_title() ?></span></h1>
<div class="summary-container">
<?php the_post(); ?>
<?/*php rewind_posts();*/ ?>
<?php
    $paged_t = (get_query_var('paged')) ? get_query_var('paged') : 1;

    global $wp_query;


    $options = get_option('km_theme_options');
    if(isset($options['category_posts_per_page'])){
    	$page_limit = $options['category_posts_per_page'];
    } else{
    	$page_limit = $wp_query->max_num_pages;
    }
    
    query_posts($query_string."&paged=".$paged_t."&showposts=".$page_limit);
?>
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
<?php $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-below" class="paginated-navigation">
	<?php wp_paginate(); ?>
</div>
<?php } ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>