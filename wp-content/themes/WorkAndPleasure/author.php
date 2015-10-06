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

		<?php
			if ( have_posts() ) :
				$lang = pll_current_language('slug');
				while ( have_posts() ) : the_post();

					?>
					<header class="story-header col-xs-12">
						hiiii
						<?php echo get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' => 'img-responsive' ));?>
						<?php	the_tags( '<ul class="tags col-sm-10 pull-left text-left"><li>', '</li><li>', '</li></ul>' ); ?>
						<aside class="col-sm-2 pull-right like-meter text-right">
							<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
							<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
						</aside>
					</header>
					<div class="post-content" id="the-post">
						<?php if (get_field('display_side_bar')) {?>
						<article class="col-sm-8 pull-left col-xs-12">
							<?php } else { ?>
						<article class="col-xs-12 pull-left">
							<?php } ?>
							<header class="post-title">
								<h1><?php the_title(); ?></h1>
								<div class="credits"><p>words by <span><?php the_field('writer_credit')?></span></p>   <p>photographs by <span><?php the_field('photos_credit')?></span><span class="date pull-right"><?php the_date('j.n.Y'); ?></span></p></div>
								<div class="clearfix"></div>
							</header>
							<aside class="story-icon pull-left">
								<?php $curr_cat =  get_the_category(); ?>
								<img src="<?php echo get_field('category_image',  $curr_cat[0])?>" alt="<?php single_cat_title(); ?>">
							</aside>
							<div class="story-content">
								<?php the_content();?>
								<a class="to-top one-half no-padding text-left pull-left" style="cursor: pointer;"><i class="fa fa-caret-up"></i> Return To Top</a>
								<aside class="one-half no-padding pull-right like-meter text-right">
									<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
									<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
								</aside>
							</div>
							<div class="clearfix"></div>
						</article><!-- Close Story Content-->
						<?php if (get_field('display_side_bar')) {?>
						<aside class="side-bar col-sm-3 col-xs-12 pull-right">
							<?php
								if( have_rows('side_bar_item') ):
								// loop through the rows of data
								    while ( have_rows('side_bar_item') ) : the_row();
								        // display a sub field value
								       switch (get_sub_field('item_type')) {
									       	case 'banner':
											   $post =  (get_sub_field('select_banner'));
											   setup_postdata($post);
											   echo '<a href="'.get_the_excerpt().'" class="banner img-responsive" target="_blank">' . get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' => 'img-responsive' )) . '</a>';
										        break;
										    case 'story':
										    $post =  (get_sub_field('select_story'));
										    setup_postdata($post);
										        echo '<div class="teaser">';
										        $posttags = get_the_tags();
												if ($posttags) {
													echo '<ul class="tags">';
												  foreach($posttags as $tag) {
												    echo '<li><a href="'.get_tag_link($tag->term_id).'">'.$tag->name . '</a></li>';
												  }
												}
												echo '<a href="#"><p class="quote">„Ebistiunt apis net dem qui offic aboria delluptatem remod quibus”</p></a>
														<p class="sec">Lorem Ipsum</p>
														<a class="readmore" href="'.get_permalink().'">read more</a>

												</div>';
										        break;
								       }
								       wp_reset_postdata();
								    endwhile;
								endif;
								?>



						</aside><!-- Close Side Bar-->
						<?php } ?>
						<div class="clearfix"></div>
						<?php
								$ids = get_field('real_ppl_in_story', false, false);
								if ($ids)  {
								?>
						<section class="ppl-links col-xs-12 ">
							<h3>people mentioned in this story</h3>

<?php
								$query = new WP_Query(array(
									'post_type'      	=> 'creative_ppl',
									'post__in'		=> $ids,
									'post_status'		=> 'any',
									'orderby'        	=> 'rand',
								));

								if( $query->have_posts() ): ?>
								<ul>
									<?php
								    while ( $query->have_posts() ):
										$query->the_post();?>
										<li class="">
											<?php echo (get_the_post_thumbnail(get_the_ID(), array(154,154), array( 'class' => 'pull-left img-responsive' )));?>
											<div class="details"><h4><?php echo get_the_title();?></h4>
											<h5><?php echo get_the_excerpt();?></h5>
											<a href="#">View More</a></div>
											<div class="clearfix"></div>
										</li>
										<?php wp_reset_postdata();
								    endwhile;

								endif;
								?>
							</ul>
						</section><?php } ?>
						<div class="clearfix"></div>
						<hr style=" color: #1d1d1b; border-color:#1d1d1b; width: 100%; margin: 40px auto;">
						<aside class="related row">
							<ul>
								<?php
									$newargs = array(
										'posts_per_page' => 3,
										'orderby' => 'rand',
										'order'   => 'DESC',
									);
									 $rel_posts = new WP_Query($newargs);
									  if($rel_posts->have_posts()) :
								  while ($rel_posts->have_posts()) : $rel_posts->the_post();?>
								  <?php get_template_part('parts/part', 'thumbnail');?>
								  <?php
																endwhile;
								  endif;
								  wp_reset_postdata();
								 ?>
							</ul>
						</aside>
						<div class="clearfix"></div>
						<?php comments_template('/risky-comments.php');?>
					</div>
					<h1></h1>
					<?php

				endwhile;
			endif;
		?>
</section>
<?php
get_footer();
