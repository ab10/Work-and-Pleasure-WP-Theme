<?php
/**
 * The Header for our theme
 *
 *
 * @package Risk
 * @subpackage Risk
 * @since Risk 1.0
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
<!-- 	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/js/jquery.sidr.dark.css"> -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css?<?php echo time()?>" type="text/css" media="all">
			<?php wp_head(); ?>
			<link rel='stylesheet' id='js_composer_front-css'  href='<?php echo get_site_url();?>/wp-content/plugins/js_composer/assets/css/js_composer_front.css?ver=4.2.3' type='text/css' media='all' />

</head>
<body <?php body_class(); ?>>
	<header class="main-header row">
		<div class="top hidden-xs container">
			<aside class="col-sm-2"><a href="http://riskmadeinwarsaw.pl" class="shop-btn pull-left">SHOP</a></aside>
			<h1 class="col-sm-8 pull-left "><a class="logo" href="<?php echo get_site_url(); ?>">Risk - Work & Pleasure	</a></h1>
			<aside class="access col-sm-2 pull-right">
				<a href="#" class="fa pull-right col-sm-1 col-sm-offset-0" style="margin-right: 0;   margin-top: 4px;">&#xf002;</a>
				<div class="langswitch pull-right col-sm-6 col-sm-offset-0"><ul><?php pll_the_languages(array("display_names_as" => 'slug'));?></ul> <span class="fa" style="font-size: 12px;padding-right: 6px;">&#xf0d7;</span></div>
			</aside>
		</div>
		<nav class="head-nav hidden-xs row" role="main navigtion">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav-menu container' ) ); ?>
		</nav>
	</header>























<!--
	<div id="sidr">
		<!-- Your content --
		<div></div>
		<!-- start wp menu --
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav-menu container' ) ); ?>
		<!-- end wp menu --
	</div>
-->

<!--
	<header class="mobile-header visible-xs row">
		<a href="<?php get_site_url(); ?>"><h1 class="logo">Risk</h1></a>
		<a id="simple-menu" href="#sidr" class="navbar-toggle nav-toggle pull-right" >
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
	</header>
-->

	<!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=258531367503657";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->

