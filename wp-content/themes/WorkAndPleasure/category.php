<?php
/**
 * The main template Category file
 *
 *
 * @package Risk
 * @subpackage Risk
 * @since Risk
 */

get_header(); ?>
<div class="row">
	<div class="container">
<?php $q_vars = ($wp_query->query_vars);
		$terms = get_term( $q_vars["cat"], 'category');
		$cat_id = ($q_vars["cat"]);?>
		<header class="row cat-head">
			<img src="<?php echo get_field('category_image', $terms)?>" alt="<?php single_cat_title(); ?>">
			<h1 class="row"><?php single_cat_title(); ?></h1>
			<h3 class="row"><?php echo get_field('category_desc', $terms)?></h3>
		</header><!--
	<button class="pull-right col-sm-2 transition-fast popular-btn">most popular</button>
	<button class="pull-right col-sm-2 transition-fast liked-btn">stories i liked</button>
-->	</div>
</div>
<?php get_template_part( 'parts/part', 'timeline' );?>
<?php get_template_part( 'parts/part', 'thumbnail-grid' );?>
</div><!-- Close .home-wrapper -->
<div class="clearfix"></div>
<?php get_footer(); ?>
