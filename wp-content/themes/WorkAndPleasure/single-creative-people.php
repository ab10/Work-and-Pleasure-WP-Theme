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
			<header class="row cat-head person-head">
				<?php echo remove_width_attribute(get_the_post_thumbnail(get_the_ID(), 'person', array( 'class' => 'img-responsive person transition-fast' )));?>
				<h1 class="row"><?php the_title(); ?></h1>
				<h3 class="row"><?php the_excerpt();?></h3>
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

<?php
/*
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'post',
	'meta_key'		=> 'real_ppl_in_story',
	'meta_key_vaue' => 'TOMASZ SZTABA'
);
*/
$postID = get_the_ID();
$args = array(
	'numberposts'	=> -1,
	'post_type'  => 'post',
	'meta_query' => array(
    array(
        'key'     => 'real_ppl_in_story',
        'value'   => '"' .$postID. '"',
        'compare' => 'LIKE'
    )
)
);
$the_query = get_posts( $args );
//query_posts('cat='.$cat_id);
$i = 0;
if($the_query) :
  foreach ($the_query as $post) : ?>
  <li class="story-thumb  col-sm-4">
			<a href="<?php the_permalink()?>">
			<?php echo remove_width_attribute(get_the_post_thumbnail(get_the_ID(), 'my-thumbnail', array( 'class' => 'img-responsive' )));?></a>
			<p class="quote transition-fast">„Ebistiunt 1apis net dem qui offic aboria delluptatem remod quibus” </p>
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
	  $i++;
	  if ($i > 10) {
		  break;
	  }
  endforeach;
  endif;
 ?>
	</ul>
	</div>
</div><!-- Close .home-wrapper -->
<div class="clearfix"></div>
</section>

<?php
get_footer();
