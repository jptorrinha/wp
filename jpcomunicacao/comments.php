<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
     <div class="entry">       

        <div class="post-widget">                    
            <div class="post-meta">    
                <h3 class="title"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>    
            </div><!--END POST-META-->                
        </div><!--END POST-WIDGET-->
        
        <div class="clear"></div>
                       
        <ul id="comment-list">
        <?php wp_list_comments('callback=bra_cust_comment'); ?>
        </ul><!--END comment-list-->
            
    </div><!--END entry-->

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
           <div class="entry">    
                <div class="post-widget">                    
                    <div class="post-meta">    
                        <h3 class="title leave_a_comment"><?php comment_form_title( 'Leave a comment', 'Leave a comment to %s' ); ?></h3>    
                        <p>Make sure you fill in all mandatory fields.</p>
                    </div><!--END POST-META-->                
                </div><!--END POST-WIDGET-->

                <a name="respond" style="position:relative; top:-150px"></a> 
                <div class="comment-form-wrapper">
                    <div class="cancel-comment-reply">
                        <small><?php cancel_comment_reply_link(); ?></small>
                    </div>
              
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>        


<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form" class="form">
<ul>                  
<?php if ( is_user_logged_in() ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>
  
                
                    <li>
                        <p>Name <?php if ($req) echo "<em>(Required)</em>"; ?></p>
                        <input name="author" type="text" class="<?php if ($req) echo "requiredField"; ?>" value="<?php echo esc_attr($comment_author); ?>" />
                    </li>
                                        
                    <li>    
                        <p>Email <?php if ($req) echo "<em>(Required, but not published)</em>"; ?></p>        
                        <input name="email" type="text" class="<?php if ($req) echo "requiredField email"; ?> email" value="<?php echo esc_attr($comment_author_email); ?>" />
                    </li>
                                        
                    <li>
                        <p>Url <em>(Optional)</em></p>    
                        <input name="url" type="text" class="last" value="<?php echo esc_attr($comment_author_url); ?>"/>
                    </li>

<?php endif; ?> 
                    <li class="textarea">
                        <p>Comment <em>(Required)</em></p>    
                        <textarea name="comment" rows="50" cols="20" class="<?php if ($req) echo "requiredField"; ?>"></textarea>        
                    </li>
    
                                        
                    <li class="submit-button">
                        <input value="Post Comment &raquo;" type="submit" class="submit" />        
                    </li> 
               </ul>                                   

<?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>

                
          </form><!--END comment-form-->
          


<?php endif; // If registration required and not logged in ?>


<?php endif; // if you delete this the sky will fall on your head 
?>
            </div> <!-- end of comment-form-wrapper -->
        
        </div><!--END ENTRY--> 
<?php


function bra_cust_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li>                        

                    <div class="comment-meta">
                        <span class="comment-author"><a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a></span>
                        <span class="date"><?php comment_time('M j, Y'); ?></span>
                        <span class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>                        
                    </div><!--END COMMENT-META-->
                                            
                    <div class="comment-wrap">
                        <div class="comment" id="comment-<?php comment_ID(); ?>">
                            <div class="avatar">
                                <?php echo get_avatar($comment, 45); ?>                               
                            </div><!--END AVATAR--> 
                            <?php comment_text() ?> 
                        </div><!--END COMMENT-->     
                    </div><!--END COMMENT-WRAP-->
                             
                
<?php if ($comment->comment_approved == '0') : ?>
<p><em>Your comment is awaiting moderation.</em></p>
<?php endif; ?>                

<?php 
}