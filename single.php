<?php get_header(); ?>
<article id="content">
<?php the_post(); ?>
<?php /*
<div id="nav-above" class="navigation">
<p class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></p>
<p class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></p>
</div>
*/ ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-header">
<h2 class="entry-title"><?php the_title(); ?></h1>
<div class="entry-meta">
<?php /*
<span class="meta-prep meta-prep-author"><?php _e('By ', 'blankslate'); ?></span>
<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'blankslate' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
<span class="meta-sep"> | </span>
<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'blankslate'); ?></span>
*/ ?>
<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
</div>
</div>
<div class="entry-content">
<?php 
if ( has_post_thumbnail() ) {
//the_post_thumbnail();
} 
?>
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
</div>
<div class="entry-utility">
<?php printf( __( '<span class="entry-utility-item">This article was posted in %1$s%2$s.</span>', 'blankslate' ),
get_the_category_list(', '),
get_the_tag_list( __( ' and tagged ', 'blankslate' ), ', ', '' ) 
) ?>
<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // ?>
<?php show_hide_comments_link(); ?>
<?php /*printf( __( '<a class="comment-link" href="#respond" title="Add Comment">Add Comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'blankslate' ), get_trackback_url() ) */?>
<?php printf( __( ' or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'blankslate' ), get_trackback_url() ) ?>
<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // ?>
<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for post" rel="trackback">Trackback URL</a>.', 'blankslate' ), get_trackback_url() ) ?>
<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // ?>
<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a Comment">Post a Comment</a>.', 'blankslate' ) ?>
<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // ?>
<?php _e( ' Both comments and trackbacks are closed.', 'blankslate' ) ?>
<?php endif; ?>
<?php edit_post_link( __( 'Edit', 'blankslate' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
</div>
</div>
<div id="nav-below" class="navigation">
<p class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></p>
<p class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></p>
</div>
<?php display_ajax_comments(); ?>
<script type="text/javascript">
	$(document).ready(function(){
		showAjaxComments('<?php echo $id; ?>');		
	});
</script>
<?/*php comments_template('', true); */?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>