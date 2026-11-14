<?php
/**
 * Comments template
 *
 * @package Nirmal_Consultant
 */
if ( post_password_required() ) { return; }
?>

<div class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h3><?php printf( esc_html( _n( '%s Comment', '%s Comments', get_comments_number(), 'nirmal-consultant' ) ), number_format_i18n( get_comments_number() ) ); ?></h3>
        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
            ) );
            ?>
        </ol>
    <?php endif; ?>

    <?php if ( comments_open() ) : ?>
        <h3><?php esc_html_e( 'Leave a comment', 'nirmal-consultant' ); ?></h3>
        <?php
        comment_form( array(
            'title_reply'         => '',
            'comment_field'       => '<p class="comment-form-comment"><textarea id="comment" name="comment" rows="5" required placeholder="' . esc_attr__( 'Your comment…', 'nirmal-consultant' ) . '"></textarea></p>',
            'fields'              => array(
                'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" required placeholder="' . esc_attr__( 'Name *', 'nirmal-consultant' ) . '"></p>',
                'email'  => '<p class="comment-form-email"><input id="email" name="email" type="email" required placeholder="' . esc_attr__( 'Email *', 'nirmal-consultant' ) . '"></p>',
            ),
            'submit_button'       => '<button type="submit" class="btn btn--navy">%4$s</button>',
            'label_submit'        => __( 'Post Comment', 'nirmal-consultant' ),
            'comment_notes_after' => '',
        ) );
        ?>
    <?php endif; ?>
</div>
