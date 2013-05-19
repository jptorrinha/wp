<?php
get_header(); 
wp_reset_query();
global $root, $timthumb; 

if ( have_posts() ) while ( have_posts() ) : the_post();

        // get all featured images
        $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
        $featured_images[] = $featured_image_array[0];
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio_item', 'secondary-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio_item', 'secondary-image', $post->ID );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio_item', 'third-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio_item', 'third-image', $post->ID );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio_item', 'fourth-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio_item', 'fourth-image', $post->ID );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio_item', 'fifth-image')) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio_item', 'fifth-image', $post->ID );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        
        for ($i = 6 ; $i <= 20 ; $i++)
        {
        if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('portfolio_item', "image-$i")) :
            $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'portfolio_item', "image-$i", $post->ID );
            $image_feature_url = wp_get_attachment_image_src( $image_id,'feature-image' );
            $featured_images[] = $image_feature_url[0];
        endif;
        }
        
        
        
        // get additional HTML
        $additional_HTML = get_post_meta($post->ID, "bra_additional_content", true);

?>
<div id="portfolio-item-wrapper">
    
        <div class="portfolio-item-holder">
        
        <div class="portfolio-item">
            <div id="portfolio-slider">
            <?php if ($additional_HTML != "") echo $additional_HTML; ?> 
                <div class="slides_container">
                    <?php
                    foreach ($featured_images as $image)
                    {
                    ?>
                    <img src="<?php echo $image; ?>" alt=""/>
                    <?php
                    }
                    ?>      
                </div><!--END SLIDES-CONTAINER-->
            </div><!--END SLIDES-->
        </div><!--END PORTFOLIO-ITEM-->
        

        </div><!--END PORTFOLIO-ITEM-HOLDER-->    
    
        <div class="portfolio-item-details">
        
            <ul class="item-nav">
                <li class="prev"><?php be_next_post_link("%link", "%title", true, "", 'portfolio_category') ?></li>
                <li class="next"><?php be_previous_post_link("%link", "%title", true, "", 'portfolio_category') ?></li>
                <li class="all"><a href="#">All</a></li>
            </ul><!--END ITEM-NAV-->
            
            <div class="item-details">
                <h1 class="title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <?php
                $link_text = get_post_meta(get_the_ID(), 'bra_link-text', true);
                $link_url = get_post_meta(get_the_ID(), 'bra_link-url', true);
                if ($link_url != "")
                {
                    if ($link_text == "") $link_text = "Launch website &raquo;";
                ?>
                <a href="<?php echo $link_url; ?>" class="button small rectangle <?php echo get_option($var_prefix."color"); ?>" target="_blank" ><?php echo $link_text; ?></a>
                <?php
                }
                ?>

            </div><!--END ITEM-DETAILS-->       
        </div><!--END PORTFOLIO-ITEM-DETAILS-->  
                  
        <?php
        $pag_w = ceil(count($featured_images) * 16);
        ?>
        <style type="text/css">
        <!--
        ul.pagination { width: <?php echo $pag_w; ?>px; }
        -->
        </style>
        
    </div><!--END PORTFOLIO-ITEM-WRAPPER-->
             
<?php
endwhile;
?>

            
                  
            


<?php get_footer(); ?>