<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) : ?>
    <h3><?php comments_number( esc_html__('0 Comment', 'synck'), esc_html__('1 Comment', 'synck'), esc_html__('% Comments', 'synck') ); ?></h3>
    <div class="comments-list">
        <div class="comment-box">
        <?php wp_list_comments('callback=synck_theme_comment'); ?>
        </div>
    </div>

<?php
// Are there comments to navigate through?
if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
<div class="text-center">
<ul class="pagination">
<li>
<?php //Create pagination links for the comments on the current post, with single arrow heads for previous/next
paginate_comments_links( 
array(
'prev_text' => wp_specialchars_decode('<i class="fa fa-angle-left"></i>',ENT_QUOTES),
'next_text' => wp_specialchars_decode('<i class="fa fa-angle-right"></i>',ENT_QUOTES),
));  ?>
</li> 
</ul>
</div>
<?php endif; // Check for comment navigation ?>
<?php if ( ! comments_open() && get_comments_number() ) : ?>
<p class="no-comments"><?php echo esc_html__( 'Comments are closed.' , 'synck' ); ?></p>
<?php endif; ?> 
<?php endif; ?>

<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                // 'id_form' => 'commentform',        
                'class_form' => 'comment-form', 
                'title_reply_before'=> '<h3>',                
                'title_reply'=> esc_html__( 'Leave a Reply', 'synck' ),
                'title_reply_after'=> '</h3>',
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'cookies' => '',
                    'author' => '',
                    'Name' => '<div class="input-group">
            <input id="author" name="author" type="text" placeholder="'. esc_attr__('Name', 'synck').'" required="required" >
</div>',
                    'Email' => '
    <div class="input-group">
        <!-- Email -->
        <input id="email" name="email" type="email" placeholder="'.esc_attr__('Email', 'synck').'" required="required">
    </div>'  ,                                                                                 
                ) ),   
                'comment_field' => '
                <div class="input-group">
                    <textarea name="comment"'.$aria_req.'  placeholder="'.esc_attr__('Your Message', 'synck').'"></textarea>
                </div>',

                 'label_submit' => ''.esc_attr__('Send Message', 'synck').'',
                 'comment_notes_before' => '',
                 'submit_button' => '<div class="input-group">
                    <button name="%1$s" type="submit" id="%2$s" class="theme-btn %3$s" value="%4$s">%4$s</button></div>',
                 'comment_notes_after' => '',                    
        )
?>


<?php if ( comments_open() ) : ?>
<div class="comment-form-wrap">
<?php comment_form($comment_args); ?>
</div>
<?php endif; ?> 

<!-- End Comments Form -->

