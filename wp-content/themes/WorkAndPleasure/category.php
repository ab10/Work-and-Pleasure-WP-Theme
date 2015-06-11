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

	<div class="row">
		<div class="container">
			<?php $terms = get_term( $_GET["cat"], 'category');
				$cat_id = ($_GET["cat"]);?>

			<header class="row cat-head">
				<img src="<?php echo get_field('category_image', $terms)?>" alt="<?php single_cat_title(); ?>">
				<h1 class="row"><?php single_cat_title(); ?></h1>
				<h3 class="row"><?php echo get_field('category_desc', $terms)?></h3>
			</header>

<!--
		<button class="pull-right col-sm-2 transition-fast popular-btn">most popular</button>
		<button class="pull-right col-sm-2 transition-fast liked-btn">stories i liked</button>
-->	</div>
</div>
<?php get_template_part( 'parts/part', 'timeline' );?>

<div class="thumb-grid">
		<ul>
<?php
query_posts('cat='.$cat_id);
$t = 0;
if(have_posts()) :
  while (have_posts()) : the_post();?>
  <li class="story-thumb col-sm-4">
			<a class="thumb" href="<?php the_permalink()?>" style="background-image: url()"><img class="transition-fast" src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'my-thumbnail' );
				echo $thumb['0'];?>"></a>
			<a href="<?php the_permalink()?>" class="qlink "><p class="quote transition">
				<?php if( have_rows('quote') ):
					while ( have_rows('quote') ) : the_row();
					        the_sub_field('quote_text');
							$post_ob = get_sub_field('person');
							echo "<span class='transition-slow'>".($post_ob->post_title)."</span>";
					    endwhile;
					endif;
				?></p></a>
			<?php	the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
			<a href="<?php the_permalink()?>">
				<h2><?php the_title();?></h2>
				<p class="excerpt"><?php echo get_the_excerpt();?></p>
			</a>
			<aside class="like-meter">
				<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
				<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
			</aside>
		</li>
  <?php
	  $t++;
							if ($t == 3) {echo "<div class='clearfix hidden-xs'></div>"; $t=0;}
  endwhile;
  endif;
 ?>
	</ul>
	</div>
</div><!-- Close .home-wrapper -->
<div class="clearfix"></div>


<?php
get_footer();
