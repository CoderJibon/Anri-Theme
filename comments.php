




<ul class="single-post__comments-list">
	<?php wp_list_comments([
		'walker'	=> new anri_comment_wp()
	]); ?>
</ul>
<div class="single-post__comments-respond">
<?php 
$required_text = sprintf(
		/* translators: %s: Asterisk symbol (*). */
		' ' . __( 'Required fields are marked %s' ),
		'<span class="required">*</span>'
	);
	$req      = get_option( 'require_name_email' );
	$html_req = ( $req ? " required='required'" : '' );
	$html5    = 'html5' === $args['format'];

	comment_form([
		'title_reply'	=> 'Leave a Comment',
		'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
		'title_reply_after'    => '</h5>',
		'comment_field'			=> sprintf(
			'<p class="single-post__comments-respond-comment">%s %s</p>',
			sprintf(
				'<label for="comment">%s</label>',
				_x( 'Comment', 'noun' )
			),
			'<textarea id="comment" name="comment"  cols="45" rows="8" maxlength="65525" required="required" aria-required="true"></textarea>'
		),

		 'comment_notes_before'	=> ' ',
		 'submit_field'         => '<p class="single-post__comments-respond-url">%1$s %2$s</p>',

		 'fields'		=> array(

		 		'cookies'	=>  ' ',

		 		'author' => sprintf(
					'<p class="single-post__comments-respond-author">%s %s</p>',
					sprintf(
						'<label for="author">%s%s</label>',
						__( 'Name' ),
						( $req ? ' <span class="required">*</span>' : '' )
					),
					sprintf(
						'<input id="author" aria-required="true" required="required"	 name="author" type="text" value="%s" size="30" maxlength="245"%s />',
						esc_attr( $commenter['comment_author'] ),
						$html_req
					)
				),



				'email'  => sprintf(
					'<p class="single-post__comments-respond-email">%s %s</p>',
					sprintf(
						'<label for="email">%s%s</label>',
						__( 'Email' ),
						( $req ? ' <span class="required">*</span>' : '' )
					),
					sprintf(
						'<input aria-required="true" required="required" id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
						( $html5 ? 'type="email"' : 'type="text"' ),
						esc_attr( $commenter['comment_author_email'] ),
						$html_req
					)
				),


				'url'    => sprintf(
					'<p class="single-post__comments-respond-url">%s %s</p>',
					sprintf(
						'<label for="url">%s</label>',
						__( 'Website' )
					),
					sprintf(
						'<input aria-required="true" id="url" name="url" %s value="%s" size="30" maxlength="200" />',
						( $html5 ? 'type="url"' : 'type="text"' ),
						esc_attr( $commenter['comment_author_url'] )
					)
				),

				 )
			]);

 ?>
</div>

 <!--  <div class="single-post__comments-respond">
                <h5>Leave a Comment</h5>


                <form action="http://feelman.info/html/anri/single-post.html" method="post">


                  <p class="single-post__comments-respond-comment">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" cols="45" aria-required="true"></textarea>
                  </p>




                  <p class="single-post__comments-respond-author">
                    <label for="author">Name*</label>
                    <input id="author" type="text" name="author" size="30" aria-required="true" required>
                  </p>




                  <p class="single-post__comments-respond-email">
                    <label for="email-form">Email*</label>
                    <input id="email-form" type="email" name="email-form" size="30" aria-required="true" required>
                  </p>




                  <p class="single-post__comments-respond-url">
                    <label for="url">Website</label>
                    <input id="url" type="text" name="url" size="30" aria-required="true">
                  </p>



                  <p class="single-post__comments-respond-submit">
                    <input id="submit" type="submit" name="submit" size="30" value="Post Comment">
                  </p>


                </form>
              </div> -->
