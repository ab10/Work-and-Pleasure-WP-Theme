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
<!--
						<img src="<?php
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					echo $image[0];
					?>">
-->
						<h1 class="row"><?php //the_field('lead_title_'.$lang); ?></h1>
						<h3 class="col-sm-8 col-md-7"><?php //the_field('lead_sec_'.$lang); ?></h3>
						<aside class="row story-details">
							<p class="col-sm-2 pull-right date"><?php //the_date('j.n.Y'); ?></p>
						</aside>
					</header>
					<div class="post-content">
						<article class="col-sm-8 pull-left">
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
						<aside class="side-bar col-sm-3 pull-right">
							<a href="http://riskmadeinwarsaw.com" class="banner img-responsive"><img src="<?php echo get_site_url()?>/wp-content/uploads/2015/04/2.jpg"></a>
							<div class="teaser">
								<ul class="tags">
									<li><a href="#">PLEASURE</a></li>
									<a href="#"><p class="quote">„Ebistiunt apis net dem qui offic aboria delluptatem remod quibus”</p></a>
									<p class="sec">Lorem Ipsum</p>
									<a class="readmore" href="#">read more</a>
								</ul>
							</div>
							<a href="http://riskmadeinwarsaw.com" class="banner img-responsive"><img src="<?php echo get_site_url()?>/wp-content/uploads/2015/04/3.jpg"></a>
							<div class="teaser">
								<ul class="tags">
									<li><a href="#">PLEASURE</a></li>
									<a href="#"><p class="quote">„Ebistiunt apis net dem qui offic aboria delluptatem remod quibus”</p></a>
									<p class="sec">Lorem Ipsum</p>
									<a class="readmore" href="#">read more</a>
								</ul>
							</div>
						</aside><!-- Close Side Bar-->
						<div class="clearfix"></div>
						<section class="ppl-links col-xs-12">
							<h3>people mentioned in this story</h3>
							<ul>
								<li class="">
									<img class="img-reponsive pull-left" src="<?php echo get_site_url()?>/wp-content/uploads/2015/04/untitled-1.jpg"/>
									<div class="pull-right"><h4>Lorem ipsasumer </h4>
									<h5>Lorem ipsumer </h5>
									<a href="#">zobacz więcej</a></div>
								</li>
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
