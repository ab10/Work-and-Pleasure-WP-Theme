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
		<?php
			if ( have_posts() ) :
				$lang = pll_current_language('slug');
				while ( have_posts() ) : the_post();

					?>
					<header class="story-header col-xs-12">
						<?php echo get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' => 'img-responsive' ));?>
						<?php	the_tags( '<ul class="tags col-sm-10 pull-left text-left"><li>', '</li><li>', '</li></ul>' ); ?>
						<aside class="col-sm-2 pull-right like-meter text-right">
							<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
							<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
						</aside>
					</header>
					<div class="post-content">
						<?php if (get_field('display_side_bar')) {?>
						<article class="col-sm-8 pull-left">
							<?php } else { ?>
						<article class="col-sm-12 pull-left">
							<?php } ?>
							<header class="post-title">
								<h1><?php the_title(); ?></h1>
								<p class="credits">words by <span>Carl Honoré</span>   photographs by <span>Mark Sanders</span><span class="date pull-right"><?php the_date('j.n.Y'); ?></span></p>
							</header>
							<aside class="story-icon pull-left"> <img src="<?php echo get_site_url()?>/wp-content/uploads/2015/03/cat1.jpg"> </aside>
							<div class="story-content pull-right">
								<?php the_content();?>
								<button class="to-top one-half no-padding text-left pull-left"><i class="fa fa-caret-up"></i> Return To Top</button>
								<aside class="one-half no-padding pull-right like-meter text-right">
									<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp;
									<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
								</aside>
							</div>
							<div class="clearfix"></div>
						</article><!-- Close Story Content-->
						<?php if (get_field('display_side_bar')) {?>
						<aside class="side-bar col-sm-3 pull-right">
							<?php
								if( have_rows('side_bar_item') ):
								// loop through the rows of data
								    while ( have_rows('side_bar_item') ) : the_row();
								        // display a sub field value
								       switch (get_sub_field('item_type')) {
									       	case 'banner':
											   $post =  (get_sub_field('select_banner'));
											   setup_postdata($post);
											   echo '<a href="'.get_the_excerpt($post).'" class="banner img-responsive">' . get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' => 'img-responsive' )) . '</a>';
										        break;
										    case 'story':
										    $post =  (get_sub_field('select_story'));
										    setup_postdata($post);
										        echo '<div class="teaser">';
										        $posttags = get_the_tags();
												if ($posttags) {
													echo '<ul class="tags">';
												  foreach($posttags as $tag) {
												    echo '<li><a href="'.get_site_url().'/'.$tag->slug.'">'.$tag->name . '</a></li>';
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
						<section class="ppl-links col-xs-12">
							<h3>people mentioned in this story</h3>
							<?php
								$post_objects = get_field('real_ppl_in_story');
								if( $post_objects ): ?>
								<ul>
									<?php
								    foreach( $post_objects as $post):
										setup_postdata($post);?>
										<li class="">
											<?php echo remove_width_attribute(get_the_post_thumbnail(get_the_ID(), 'person', array( 'class' => 'pull-left img-responsive' )));?>
											<div class="pull-right"><h4><?php echo get_the_title();?></h4>
											<h5><?php echo get_the_excerpt($post);?></h5>
											<a href="#">View More</a></div>
										</li>
										<?php wp_reset_postdata();
								    endforeach;
								endif;
								?>

<!--

								<li class="">
									<img class="img-reponsive pull-left" src="<?php echo get_site_url()?>/wp-content/uploads/2015/04/untitled-1.jpg"/>
									<div class="pull-right"><h4>Lorasem ipsumer </h4>
									<h5>Lom ipsumer </h5>
									<a href="#">zobacz więcej</a></div>
								</li>
								<li class="">
									<img class="img-reponsive pull-left" src="<?php echo get_site_url()?>/wp-content/uploads/2015/04/untitled-1.jpg"/>
									<div class="pull-right"><h4>Lorfggfgfm iper </h4>
									<h5>Lorem ipsumer </h5>
									<a href="#">zobacz więcej</a></div>
								</li>
-->
							</ul>
						</section>
						<div class="clearfix"></div>
						<hr style=" color: #1d1d1b; border-color:#1d1d1b; width: 100%; margin: 40px auto;">
						<?php comments_template();?>
					</div>
					<h1></h1>
					<?php

				endwhile;
			endif;
		?>
</section>
<?php
get_footer();
