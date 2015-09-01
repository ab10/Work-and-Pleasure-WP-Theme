<?php
/*
Template Name: Search Page
*/
get_header();  ?>



<div class="row">
	<div class="container">

            <?php global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query); ?>
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<header class="page-header">
	<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
</header><!-- .page-header -->
		<?php if ( have_posts() ) :
			$t = 0;
			while ( have_posts() ) : the_post();
				get_template_part('parts/part', 'thumbnail');
				 $t++;
				 if ($t == 3) {echo "<div class='clearfix hidden-xs'></div>"; $t=0;}
			endwhile;
		else :
			echo "<p>No results found.</p>";
		endif;?>
    </div>
</div>

<?php get_footer(); ?>