<li class="story-thumb col-sm-4">
	<a class="thumb" href="<?php the_permalink()?>" style="background-image: url()"><img class="transition-fast" src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'my-thumbnail' );
		echo $thumb['0'];?>"></a>
	<a href="<?php the_permalink()?>" class="qlink "><p class="quote transition-slow">
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
		<p class="excerpt"><?php echo wp_trim_excerpt(get_the_excerpt());?></p>
	</a>
	<aside class="like-meter">
<!-- 				<i class="fa fa-facebook-official"></i> 136 &nbsp;&nbsp; -->
<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
	</aside>
</li>