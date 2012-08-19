<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC' rel='stylesheet' type='text/css'>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/default.js" ></script>
<link rel="stylesheet" href="<?php bloginfo("template_url");?>/scripts/dropdownmenu/css/style.css"/>
<link rel="stylesheet" href="<?php bloginfo("template_url");?>/scripts/dropdownmenu/css/ie.css"/>

</head>

<body <?php body_class(); ?>>
<?php /*<div id="search">*/ ?>
<?php /*get_search_form();*/ ?>
<?php /* </div>*/ ?>
<?php /* <div id="blog-title">
<?php if ( is_singular() ) {} else {echo '<h1>';} ?><a href="<?php echo home_url() ?>/" rel="home"><?php bloginfo( 'name' ) ?></a><?php if ( is_singular() ) {} else {echo '</h1>';} ?>
<div id="banner-image"><img id="banner" src="<?php bloginfo("template_url");?>/images/header.png"></img></div>
</div>

<img id="header_image" src="<?php bloginfo('template_url');?>/images/HeaderPhoto.png"/>

*/?>
<div id="outer-wrapper">
<div id="branding">
<div id="menu-container">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
<?php katy_archive_menu() ?>
<?php katy_category_menu() ?>
</div>
</div>
<div id="wrapper" class="hfeed">
<header>
<nav>

</nav>
</header>
<div id="container">