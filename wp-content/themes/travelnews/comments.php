<hr class="my-4">

<div class="comments">
    <h3 class="comments-title mb-4">
		<?php
			$comments_number = get_comments_number();
			if ( '0' === $comments_number ) {
				echo 'No Comment';
			} else {
				echo $comments_number . ' Comments';
			}
		?>
    </h3>
	<?php
	if ( have_comments() ) :
	?>
        <ul class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ul',
                'short_ping' => true,
                'avatar_size' => 50,
                'callback'   => 'custom_comment_output', // Custom callback function for displaying each comment
            ) );
            ?>
        </ul>

        <?php
			the_comments_pagination( array(
				'prev_text' => 'Previous',
				'next_text' => 'Next',
			) );
			endif;
        ?>
    </div>
<hr class="my-4">
<?
if (comments_open()) {
    $aria_req = ( $req ? " aria-required='true'" : '' );
    comment_form(
        array(
            'class_submit' => 'btn btn-primary', // Bootstrap button class
            'comment_field' => '<div class="form-group mb-3">
                                    <label for="comment">' . _x( 'Comment', 'noun' ) . '<span class="text-danger"> *</span></label>
                                    <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                </div>',
            'fields' => array(
                'author' => '<div class="form-group mb-3">
                                <label for="author">' . __( 'Name', 'domain' ) . '<span class="text-danger"> *</span></label>
                                <input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
                            </div>',
                'email' => '<div class="form-group mb-3">
                                <label for="email">' . __( 'Email', 'domain' ) . '<span class="text-danger"> *</span></label>
                                <input class="form-control" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
                            </div>',
                'url' => '<div class="form-group mb-3">
                                <label for="url">' . __( 'Website', 'domain' ) . '</label>
                                <input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
                            </div>',
            ),
        )
    );

}
?>