
	<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback which is
 * located in the loop-comments.php file.
 *
 */
?>

<?php if ( post_password_required() ) :
		 if (comments_open() ) : ?>
		<p><?php _e( 'This post is password protected. Enter the password to view any comments.' ); ?></p>
	<?php endif;
		return;
	endif; ?>

<div class='comment-entry post-entry'>
<?php if ( have_comments() ) : ?>
	<div class='comment_container'>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?
			echo "<span class='comment_page_nav_links comment_page_nav_links_top'>";
			echo "<span class='comment_prev_page'>";
				 previous_comments_link( __( '&laquo; Older Comments' ) );
			echo "</span>";
			echo "<span class='comment_next_page'>";
				 next_comments_link( __( 'Newer Comments &raquo;' ) );
			echo "</span>";
			echo "</span>";
		endif; // check for comment navigation


			//get comments
			$comment_entries = get_comments(array( 'type'=> 'comment', 'post_id' => $post->ID ));

			if(!empty($comment_entries)){

		 	?>
			<ol class="commentlist col-md-7 col-xs-12" id="comments">
				<?php
					if ( get_comments_number() != "0" || comments_open() ) : ?>
					<div class='comment_meta_container '>

				<div class='side-container-comment'>

		        		<div class='side-container-comment-inner'>
		        			<?php
		        			$ccount = (int) get_comments_number();
		        			$rep	= __( 'Responses to this story' );
		        			if($ccount === 1) $rep	= __( 'Response to this story' );
		        			?>
							<h3>
			        			<span class='comment-count'><?php echo $ccount; ?></span>
	   						<span class='comment-text'><?php echo $rep; ?></span>
	   						<span class='center-border center-border-left'></span>
	   						<span class='center-border center-border-right'></span>
							</h3>
		        		</div>

		        	</div>

			</div>
<div class="clearfix"></div>
<?php
endif;
					wp_list_comments( array( 'type'=> 'comment', 'avatar_size'=>0,  ) );
				?>
			</ol>
			<?php
			}?>





<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?
			echo "<span class='comment_page_nav_links comment_page_nav_links_bottom'>";
			echo "<span class='comment_prev_page'>";
				 previous_comments_link( __( '&laquo; Older Comments' ) );
			echo "</span>";
			echo "<span class='comment_next_page'>";
				 next_comments_link( __( 'Newer Comments &raquo;' ) );
			echo "</span>";
			echo "</span>";
		endif; // check for comment navigation

	echo "</div> <!-- end grid div-->";


	else : // or, if we don't have comments:

	//do nothing



endif; // end have_comments()



	/* Last but not least the comment_form() wordpress function
	 * renders the comment form as defined by wordpress itself
	 * if you want to modify the submission form check the documentation here:
	 * http://codex.wordpress.org/Function_Reference/comment_form
	 */
	 if(comments_open()){
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
	 	$fields =  array(

		  'author' =>
		    '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="Name *" value="' . esc_attr( $commenter['comment_author'] ) .
		    '" size="30"' . $aria_req . ' />' .
		    '</p>',

		  'email' =>
		    '<p class="comment-form-email"><input id="email" placeholder="Email*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		    '" size="30"' . $aria_req . ' /> ' .

		    '</p>',

		);

		 echo "<div class='comment_container col-md-4 col-xs-12 pull-right'>";
		 comment_form( array ('title_reply'       => __( 'Leave a Comment' ), 'fields' => $fields ) );
		 echo "</div><div class='clearfix'></div>";
	 }
	 else if(get_comments_number())
	 {
		 /* If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 */

	 	echo "<h3 class=' commentsclosed'>".__( 'Comments are closed.' )."</h3>";
	 }

	  ?>

</div>