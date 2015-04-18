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
		<section class="timeline col-sm-10 pull-left">
			<p class="pull-left col-sm-2">OLD stories</p>
			<p class="float-center col-sm-6 the-line"><i class="fa fa-circle the-scrubber"></i></p>
			<p class="pull-right col-sm-3">new stories</p>
		</section>
<!--
		<button class="pull-right col-sm-2 transition-fast popular-btn">most popular</button>
		<button class="pull-right col-sm-2 transition-fast liked-btn">stories i liked</button>
-->	</div>
</div>
	<div class="thumb-grid">
		<ul>


		<li class="story-thumb col-sm-4">
			<a href="#">
			<?php echo remove_width_attribute(get_the_post_thumbnail(get_the_ID(), 'my-thumbnail', array( 'class' => 'img-responsive transition-fast' )));?>
			</a>
			<p class="quote transition-fast">„Ebistiunt apis net dem qui offic aboria delluptatem remod quibus”<span>Loremis ipsumer</span></p>
			<?php	the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
			<a href="<?php the_permalink()?>">
				<h2><?php the_title();?></h2>
				<p class="excerpt">Eperiame nihiliquam ipsuscius dolore nihiliquam
ipsuscius dolo loremis arter are clock </p>
			</a>
			<aside class="like-meter">
				<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
				<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
			</aside>
		</li>
		<li class="story-thumb col-sm-4">
			<a href="#">
			<?php echo remove_width_attribute(get_the_post_thumbnail(get_the_ID(), 'my-thumbnail', array( 'class' => 'img-responsive transition-fast' )));?>
			</a>
			<p class="quote transition-fast">„Ebistiunt apis net dem qui offic aboria delluptatem remod quibus” </p>
			<?php	the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
			<a href="<?php the_permalink()?>">
				<h2><?php the_title();?></h2>
				<p class="excerpt">Eperiame nihiliquam ipsuscius dolore nihiliquam
ipsuscius dolo loremis arter are clock </p>
			</a>
			<aside class="like-meter">
				<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
				<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
			</aside>
		</li>
		<li class="story-thumb col-sm-4">
			<a href="#">
			<?php echo remove_width_attribute(get_the_post_thumbnail(get_the_ID(), 'my-thumbnail', array( 'class' => 'img-responsive transition-fast' )));?>
			</a>
			<p class="quote transition-fast">„Ebistiunt apis net dem qui offic aboria delluptatem remod quibus” </p>
			<?php	the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
			<a href="<?php the_permalink()?>">
				<h2><?php the_title();?></h2>
				<p class="excerpt">Eperiame nihiliquam ipsuscius dolore nihiliquam
ipsuscius dolo loremis arter are clock </p>
			</a>
			<aside class="like-meter">
				<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
				<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
			</aside>
		</li>
<?php
query_posts('cat='.$cat_id);
if(have_posts()) :
  while (have_posts()) : the_post();?>
  <li class="story-thumb  col-sm-4">
			<a href="<?php the_permalink()?>">
			<?php echo remove_width_attribute(get_the_post_thumbnail(get_the_ID(), 'my-thumbnail', array( 'class' => 'img-responsive' )));?></a>
			<p class="quote transition-fast">„Ebistiunt apis net dem qui offic aboria delluptatem remod quibus” </p>
			<?php	the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
			<a href="<?php the_permalink()?>">
				<h2><?php the_title();?></h2>
				<p class="excerpt"><?php the_field('lead_excerpt_en');?></p>
			</a>
			<aside class="like-meter">
				<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
				<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
			</aside>
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
