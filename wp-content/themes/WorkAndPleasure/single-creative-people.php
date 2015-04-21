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
<!--
		<button class="pull-right col-sm-2 transition-fast popular-btn">most popular</button>
		<button class="pull-right col-sm-2 transition-fast liked-btn">stories i liked</button>
-->	</div>
</div>
<div class="container timeline"><section class="col-sm-7 ">
			<p class="">OLD stories</p>
			<p class="the-line"><i class="fa fa-circle the-scrubber"></i></p>
			<p class="">new stories</p>
		</section></div>
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
			<a class="thumb" href="<?php the_permalink()?>" style="background-image: url(<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'my-thumbnail' );
				echo $thumb['0'];?>)"></a>
			<a href="<?php the_permalink()?>" class="qlink"><p class="quote transition-fast">
				<?php if( have_rows('quote') ):
					while ( have_rows('quote') ) : the_row();
					        the_sub_field('quote_text');
							$post_ob = get_sub_field('person');
							echo "<span>".($post_ob->post_title)."</span>";
					    endwhile;
					endif;
				?></p></a>
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
