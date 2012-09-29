<?php get_header(); ?>
<div id="content">
<?php
    $paged = (isset($_GET['paged'])) ? get_query_var('paged') : 1;
    $date_args = (get_query_var('m')) ? get_query_var('m') : '201209';
    $month = substr($date_args, strlen($date_args) - 2);
    $year = substr($date_args, 0, strlen($date_args) - 2);
    
    //Get number of archive posts per page.
    $options = get_option('km_theme_options');
    if(isset($options['archive_posts_per_page'])){
    	$page_limit = $options['archive_posts_per_page'];
    } else{        
    	$page_limit = $wp_query->max_num_pages;
    }
   
    //Perform query
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query($args);
    $wp_query->query($query_string."&year=".$year."&monthnum=".$month."&paged=".$paged."&showposts=".$page_limit);

    
    //query_posts($query_string."&paged=".$paged_t."&showposts=".$page_limit);
?>
<?php $wp_query->the_post(); ?>
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
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
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
<?php $total_pages = $wp_query->max_num_pages;?>
<?php if ( $total_pages > 1 ) { ?>
<div id="nav-below" class="paginated-navigation">
	<?php wp_paginate(); ?>
</div>
<?php } ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php $wp_query = null; $wp_query = $temp; ?>