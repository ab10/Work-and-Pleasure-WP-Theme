<div class="thumb-grid">
		<ul>
<?php
$q_vars = ($wp_query->query_vars);
$terms = get_term( $q_vars["cat"], 'category');
$cat_id = ($q_vars["cat"]);
query_posts('cat='.$cat_id);
$t = 0;
if(have_posts()) :
  while (have_posts()) : the_post();?>
  			<?php get_template_part('parts/part', 'thumbnail');?>
  <?php
	  $t++;
	  if ($t == 3) {echo "<div class='clearfix hidden-xs'></div>"; $t=0;}
  endwhile;
  endif;
 ?>
	</ul>
	</div>