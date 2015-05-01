<?php
/**
 * The main template file
 *
 *
 * @package Risk
 * @subpackage Risk
 * @since Risk
 */



get_header(); ?>
<section class="main-content container">
	<div class="wpb_row vc_row-fluid">
	<div class="vc_span12 wpb_column column_container">
		<div class="wpb_wrapper">
			<?php $terms = get_term( $_GET["cat"], 'category');
				$cat_id = ($_GET["cat"]);?>

			<header class="row cat-head">
				<img src="<?php echo get_field('category_image', $terms)?>" alt="<?php single_cat_title(); ?>">
				<h1 class="row"><?php single_cat_title(); ?></h1>
				<h3 class="row"><?php echo get_field('category_desc', $terms)?></h3>
			</header>
		</div>
<!--
		<button class="pull-right col-sm-2 transition-fast popular-btn">most popular</button>
		<button class="pull-right col-sm-2 transition-fast liked-btn">stories i liked</button>
-->	</div>
</div>
<?php get_template_part( 'parts/part', 'timeline' );?>
	<div class="thumb-grid">
		<ul>
<?php
	$args = array(
	'numberposts'	=> -1,
	'post_type'  => 'creative_ppl'
);
query_posts($args);
if(have_posts()) :
  while (have_posts()) : the_post();?>
 		 <li class="story-thumb  col-sm-3">
			<a class="thumb person" href="<?php the_permalink()?>" style="background-image: url(<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'my-thumbnail' );
				echo $thumb['0'];?>)"></a>
			<a href="<?php the_permalink()?>">
				<h2><?php the_title();?></h2>
				<p class="excerpt"><?php echo get_the_excerpt()?></p>
			</a>
		</li>
  <?php
  endwhile;
  endif;
 ?>
	</ul>
	</div>
</div><!-- Close .home-wrapper -->
<div class="clearfix"></div>
</section>

<?php
get_footer();
