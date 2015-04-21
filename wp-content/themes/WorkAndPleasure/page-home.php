<?php
 /**
 *
 * This is the template page that displays Work&Pleasure Magazine Home Page.
 * Template Name: Home Page
 *
 * @package Work&Pleasure
 * @subpackage Work&Pleasure
 * @since Work&Pleasure 1.0 2015
 */
function short_link ( $atts, $content ){
 extract( shortcode_atts( array(
		'color' => 'link',
		'ref' => ''
	), $atts ) );
	$linkBase = get_site_url();
	return '<a style="color:#'.esc_attr($color) .'" href="'. $ref  .'" class="cat-link " data-kind="'.$content.'">'. $content .'<span class="home-border" style="border-color:#'.esc_attr($color) .'"></span></a>';
}

add_shortcode( 'link', 'short_link' );

get_header(); ?>
<section class="content">
	<div class="home-wrapper container">
		<div id="home-carousel" class="carousel slide " data-ride="carousel">
<?php
if(have_posts()) :
  while (have_posts()) : the_post();
  $post_objects = get_field('posts_for_carousel');

if( $post_objects ): ?>
	    <!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
    <?php $i=0; foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post);
	        if ($i == 0) {?>
		         <div class="item active" href-data="<?php echo get_permalink();?>" style="background-image: url(<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;?>);">
	       <?php $i++;
		       } else { ?>
         <div class="item" href-data="<?php echo get_permalink();?>" style="background-image: url(<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;?>);">
       <?php }
		  // echo (get_the_post_thumbnail(get_the_ID(), array( 'class' => 'pull-left img-responsive' )));?>
        </div>
    <?php endforeach; ?>
    <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;?>
 <nav class="home-text"><?php the_content();?></nav>
<?php  endwhile;
  endif;
 ?>
		</div> <!-- Close #home-carousel -->
		<hr style="border-color: #bbbbba; border-width: 2px; margin: 35px 0"/>
		<section class="squares-wrapper">
			<?php
				$args = array(
					'type'                     => 'post',
					'orderby'                  => 'name',
					'order'                    => 'ASC',
					'hide_empty'               => 1,
					'exclude'                  => '13, 23',
					'taxonomy'                 => 'category',
				);
				$categories = get_categories($args);
				shuffle($categories);
				$categories = array_slice($categories, 0, 3);
				$i = 1;
				foreach ($categories as $category) {?>
				<div class="set-wrapper set<?php echo $i; ?>">
					<div class="square tit">
						<a href="<?php echo get_site_url().'/?cat='.$category->cat_ID;?>"><img src="<?php echo get_field('category_image', $category)?>" alt="<?php single_cat_title(); ?>">
						<p><?php echo $category->cat_name;?></p></a>
					</div><?php
					$newargs = 'cat='.$category->term_id.'&posts_per_page=5';
					 query_posts($newargs); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					   <div class="square transition-fast" data-quote='
						   <?php
							   if( have_rows('quote') ):
							    while ( have_rows('quote') ) : the_row();
							        the_sub_field('quote_text');
									$post_ob = get_sub_field('person');
									$person_img = wp_get_attachment_url( get_post_thumbnail_id($post_ob->ID) );
									echo "' data-person='".($post_ob->post_title)."' data-img='".$person_img;
							    endwhile;
							else :
							endif; ?>'>
					<?php echo '<a href="'. get_permalink($post->ID).'">'.(get_the_post_thumbnail(get_the_ID(), array(146,146), array( 'class' => 'transition-fast' ))).'</a>';?></div>
					<?php endwhile; endif; ?>
				</div>
						<?php $i++; } ?>
		</section>
		<section class="home-quotes transition-fast"><img src="" class="img-responsive person pull-left transition-fast" alt=""><div class="panel pull-left panel-default transition-fast"><p class="quote transition-fast"></p><span class="transition-fast"></span></div></section>
	</div><!-- Close .home-wrapper --><div class="clearfix"></div>
</section>
<div class="clearfix"></div>
<?php get_footer(); ?>
