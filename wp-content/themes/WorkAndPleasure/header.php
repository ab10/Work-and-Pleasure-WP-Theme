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
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=258531367503657";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<header class="site-header">
		<div class="top container">
			<aside class="col-sm-2 hidden-xs"><a href="http://riskmadeinwarsaw.com" class="shop-btn pull-left">SHOP</a></aside>
			<h1 class="col-sm-8 col-xs-12 no-margin no-padding pull-left "><a class="logo" href="<?php echo get_site_url(); ?>">RISK made in Warsaw</a></h1>
			<aside class="access col-sm-2 pull-right hidden-xs">
				<div for="#search" class="fa pull-right col-sm-1 col-sm-offset-0 search-btn">&#xf002;
					<div id="search" class="">
					    <form method="get"  id="seachform" action="<?php echo get_site_url();?>/search/">
					        <input type="text" name="search" id="searchstring" placeholder="type keyword(s) here" />
					<!--         <input type="submit" class="btn btn-primary"  value="Search"> -->
					    </form>
					</div>
				</div>
				<div class="langswitch pull-right col-sm-6 col-sm-offset-0"><ul><?php pll_the_languages(array("display_names_as" => 'slug'));?></ul> <span class="fa" style="font-size: 12px;padding-right: 6px;">&#xf0d7;</span></div>
			</aside>
		</div>
		<div class="navbar-header visible-xs">
		<button type="button" class="burger collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<i class="fa fa-bars"></i>
		</button>
		<button type="button" class="backpage" >
			<span class="sr-only">Back</span>
			<i class="fa fa-chevron-left"></i>
		</button>
		<button type="button" class="totop" >
			<span class="sr-only">Back To Top</span>
			<i class="fa fa-chevron-up"></i>
		</button>
		<button type="button" class="enlarge">
			<span class="sr-only">Back To Top</span>
			<i class="glyphicon glyphicon-text-size" ></i>
		</button>
	    </div>
		<div class="head-nav collapse navbar-collapse" data-offset-top="60" role="main navigtion" id="bs-example-navbar-collapse-1">
			<button type="button" class="close-menu collapsed visible-xs" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Back To Top</span>
				<i class="fa fa-times  visible-xs" ></i>
			</button>
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav-menu container' ) ); ?>
		</div>
	</header>
	<section class="main-content container transition no-padding " id="main">

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


