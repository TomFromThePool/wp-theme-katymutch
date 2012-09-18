<?php get_header(); ?>
<div id="content">
<?php
    $paged_t = (get_query_var('paged')) ? get_query_var('paged') : 1;

    global $wp_query;

    $options = get_option('km_theme_options');
    if(isset($options['archive_posts_per_page'])){
    	$page_limit = $options['archive_posts_per_page'];
    } else{        
    	$page_limit = $wp_query->max_num_pages;
    }
    
    query_posts($query_string."&paged=".$paged_t."&showposts=".$page_limit);
?>
<?php the_post(); ?>
<?php if ( is_day() ) : ?>
<h1 class="page-title"><?php printf( __( 'Daily Archives: <span>%s</span>', 'blankslate' ), get_the_time(get_option('date_format')) ) ?></h1>
<?php elseif ( is_month() ) : ?>
<h1 class="page-title"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'blankslate' ), get_the_time('F Y') ) ?></h1>
<?php elseif ( is_year() ) : ?>
<h1 class="page-title"><?php printf( __( 'Yearly Archives: <span>%s</span>', 'blankslate' ), get_the_time('Y') ) ?></h1>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
<h1 class="page-title">Blog Archives</h1>
<?php endif; ?>
<?php rewind_posts(); ?>
<div class="summary-container">
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
</div>
<?php $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-below" class="paginated-navigation">
	<?php wp_paginate(); ?>
</div>
<?php } ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>