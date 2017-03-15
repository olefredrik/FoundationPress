<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( have_comments() ) :
	if ( (is_page() || is_single()) && ( ! is_home() && ! is_front_page()) ) :
?>
	<section id="comments"><?php


		wp_list_comments(
			array(
				'walker'            => new Foundationpress_Comments(),
				'max_depth'         => '',
				'style'             => 'ol',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => __( 'Reply', 'foundationpress' ),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 48,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5',
				'short_ping'        => false,
				'echo'  	    => true,
				'moderation' 	    => __( 'Your comment is awaiting moderation.', 'foundationpress' ),
			)
		);

		?>

 	</section>
<?php
	endif;
endif;
?>

<?php

	/*
	Do not delete these lines.
	Prevent access to this file directly
	*/

	defined( 'ABSPATH' ) || die( __( 'Please do not load this page directly. Thanks!', 'foundationpress' ) );

	if ( post_password_required() ) { ?>
	<section id="comments">
		<div class="notice">
			<p class="bottom"><?php _e( 'This post is password protected. Enter the password to view comments.', 'foundationpress' ); ?></p>
		</div>
	</section>
	<?php
		return;
	}
?>

<?php
if ( comments_open() ) :
	if ( (is_page() || is_single()) && ( ! is_home() && ! is_front_page()) ) :
?>
<section id="respond">
	<h3>
		<?php
			comment_form_title(
				__( 'Leave a Reply', 'foundationpress' ),
				/* translators: %s: author of comment being replied to */
				__( 'Leave a Reply to %s', 'foundationpress' )
			);
		?>
	</h3>
	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
	<?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
	<p>
		<?php
			/* translators: %s: login url */
			printf( __(
				'You must be <a href="%s">logged in</a> to post a comment.', 'foundationpress' ),
				wp_login_url( get_permalink() )
			);
		?>
	</p>
	<?php else : ?>
	<form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p>
			<?php
				/* translators: %1$s: site url, %2$s: user identity  */
				printf( __(
					'Logged in as <a href="%1$s/wp-admin/profile.php">%2$s</a>.', 'foundationpress' ),
					get_option( 'siteurl' ),
					$user_identity
				);
			?> <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php __( 'Log out of this account', 'foundationpress' ); ?>"><?php _e( 'Log out &raquo;', 'foundationpress' ); ?></a>
		</p>
		<?php else : ?>
		<p>
			<label for="author">
				<?php
					_e( 'Name', 'foundationpress' ); if ( $req ) { _e( ' (required)', 'foundationpress' ); }
				?>
			</label>
			<input type="text" class="five" name="author" id="author" value="<?php echo esc_attr( $comment_author ); ?>" size="22" tabindex="1" <?php if ( $req ) { echo "aria-required='true'"; } ?>>
		</p>
		<p>
			<label for="email">
				<?php
					_e( 'Email (will not be published)', 'foundationpress' ); if ( $req ) { _e( ' (required)', 'foundationpress' ); }
				?>
			</label>
			<input type="text" class="five" name="email" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" size="22" tabindex="2" <?php if ( $req ) { echo "aria-required='true'"; } ?>>
		</p>
		<p>
			<label for="url">
				<?php
					_e( 'Website', 'foundationpress' );
				?>
			</label>
			<input type="text" class="five" name="url" id="url" value="<?php echo esc_attr( $comment_author_url ); ?>" size="22" tabindex="3">
		</p>
		<?php endif; ?>
		<p>
			<label for="comment">
					<?php
						_e( 'Comment', 'foundationpress' );
					?>
			</label>
			<textarea name="comment" id="comment" tabindex="4"></textarea>
		</p>
		<p id="allowed_tags" class="small"><strong>XHTML:</strong>
			<?php
				_e( 'You can use these tags:','foundationpress' );
			?>
			<code>
				<?php echo allowed_tags(); ?>
			</code>
		</p>
		<p><input name="submit" class="button" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e( 'Submit Comment', 'foundationpress' ); ?>"></p>
		<?php comment_id_fields(); ?>
		<?php do_action( 'comment_form', $post->ID ); ?>
	</form>
	<?php endif; // If registration required and not logged in. ?>
</section>
<?php
	endif; // If you delete this the sky will fall on your head.
	endif; // If you delete this the sky will fall on your head.
