<?php
global $root, $post_id;

    the_content();  
    
    $cat_ID = get_post_meta($post_id, "bra_select_blog_category", true); 
?>

    <div class="section-nav">    
        <p>Visit our <a class="button small rounded <?php echo get_option($var_prefix."color"); ?>" href="<?php echo esc_url( get_category_link( $cat_ID ) ); ?>">archive</a></p>            
    </div><!--END SECTION-NAV-->
        
    <div class="blog-holder">

<?php

   
  $posts_per_page = get_option($var_prefix."blog_no_posts"); // -1 shows all posts
  $args=array(
    'cat' => $cat_ID,
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => $posts_per_page
  );

  $temp = $wp_query;  // assign orginal query to temp variable for later use   

  //$wp_query = null; making notice about is_singluar not called properly
  $wp_query = new WP_Query($args); 

  if( have_posts() ) :

        while ($wp_query->have_posts()) : $wp_query->the_post();

 
    
 $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
 $featured_image = $featured_image_array[0];

 $comments = comments_open() && get_option("default_comment_status ") == "open";     


 
?>
        <div class="post">            
            <div class="post-img-holder"><img src="<?php echo $featured_image; ?>" alt="" /></div>                        
            <div class="post-entry">
            
                <div class="post-meta">    
                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>    
                    <ul class="comment-date-wrap">
                        <?php
                        if ($comments)
                        {
                        ?>
                        <li class="link <?php echo get_option($var_prefix."comment_date_style"); ?>"><?php comments_popup_link('0', '1', '%'); ?></li>                
                        <?php
                        }
                        ?>
                        <li class="text <?php echo get_option($var_prefix."comment_date_style"); ?>"><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('M'); ?></span></li>
                    </ul><!--END COMMENT-DATE-WRAP-->
                </div><!--END POST-META-->
                                                                                    
                <?php 
                $pos = strpos($post->post_content, '<!--more-->');
                if ($pos) the_content(''); else the_excerpt(); 
                ?>    
                                                                        
                <div class="post-category">                    
                    <div class="left">   
                        <p>Placed in <?php the_category(', '); ?></p>
                        <p>Tagged with <?php the_tags('', ', ', ''); ?></p>                       
                    </div><!--END LEFT-->    
                        
                    <div class="right">
                        <a href="<?php the_permalink(); ?>">more +</a>                    
                    </div><!--END RIGHT-->    
                </div><!--END POST-CATEGORY-->
                
            </div><!--END POST-ENTRY-->
        </div><!--END POST-->
 
    


 <?php 
        endwhile;
    endif; 
    $wp_query = $temp;  //reset back to original query  
 ?>
    
    </div><!--END BLOG-HOLDER--> 

