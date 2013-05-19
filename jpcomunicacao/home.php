<?php get_header(); ?> 

<?php
$args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'posts_per_page' => '-1'
  );
$main_query = new WP_Query($args); 
if( have_posts() ) : 
    while ($main_query->have_posts()) : $main_query->the_post();

    global $post;

    $post_name = $post->post_name;
    
    $post_id = get_the_ID();
    
    $separate_page = get_post_meta($post_id, "bra_separate_page", true); 
    if ($separate_page != "Yes")
    {
?>
    <div class="content-wrapper" id="<?php echo $post_name; ?>">

    <?php
    if (get_post_meta($post_id, "bra_show_title", true) != "No")
    {
    ?> 
    <div class="section-title">
        <div class="two-third">            
            <h1 class="title"><?php the_title(); ?></h1>
            <?php
            if (has_excerpt())
            {
            ?>    
            <p><?php echo get_the_excerpt(); ?></p>    
            <?php
            }
            ?>
            </div><!--END TWO-THIRD-->                
    </div><!--END SECTION TITLE--> 
    
    <div class="divider-heading"></div>   
    <?php
    }
    ?>
    <div class="clear"></div>
    
    <?php
    if (get_post_meta($post_id, "bra_insert_something", true) == "slider")
    {
    ?>
    <div id="slideshow-container">
        <div id="slider"> 
            <div class="slides_container">
            <?php 
            $j = 0;
            for ($i = 0 ; $i < 10 ; $i++)
            {
                $slide_url = get_option("bra_zig_slide_0".$i);
                $slide_not_img = get_option("bra_zig_slide_not_img_0".$i);
                $slide_not_img = trim($slide_not_img);
                if ($slide_url != "" || $slide_not_img != "")
                {
                    $j++;
                    $caption = get_option("bra_zig_slide_0" . $i ."_caption");
                    $link_url = get_option("bra_zig_slide_0" . $i ."_link_url");
            ?>                       
                <div class="slide">
                    <?php 
                    if ($slide_url != "") 
                    { 
                    ?>    
                    <a href="<?php echo $link_url; ?>"><img src="<?php echo $slide_url; ?>" alt="<?php echo $caption; ?>" /></a>
                    <?php 
                    } 
                    if ($slide_not_img != "")  
                    { 
                        echo $slide_not_img; 
                    } 
                    ?> 
                    <?php if ($caption != "") 
                    {
                        if ($slide_not_img != "")
                        { 
                        ?>
                        <a href="<?php echo $link_url; ?>">
                        <?php
                        }
                        ?>
                            <div class="caption"><p><?php echo $caption; ?></p></div>
                        <?php
                        if ($slide_not_img != "")
                        { 
                        ?>
                        </a>
                        <?php
                        }  
                    } 
                    ?>               
                </div><!--END SLIDE-->
            <?php
                }
            }
            if ($j > 1) wp_enqueue_script("slider_simple_home", $root."/javascript/slider-simple-home.js");
            if ($j == 1) wp_enqueue_script("slider_simple_home_1", $root."/javascript/slider-simple-home-1.js"); 
            ?>
            </div><!--END SLIDES_CONTAINER-->
        </div><!--END SLIDER-->
    </div><!--END SLIDESHOW-CONTAINER-->    
    <?php 
    }

    if (get_post_meta($post_id, "bra_insert_something", true) == "contact_form")
    {
    ?>
    <div class="one-half">
    <?php the_content(); ?>
    </div><!--END ONE-HALF-->
    <div class="one-half last">
    <?php include("contact_section.inc.php"); ?>
    </div><!--END ONE-HALF LAST-->
    <?php   
    }
    else
    {
        if (get_post_meta($post_id, "bra_select_portfolio_category", true) != "")
        {
            include("portfolio_section.inc.php");
        }
        else
        {
           if (get_post_meta($post_id, "bra_select_blog_category", true) != "") 
           {
               include("blog_section.inc.php"); 
           }
           else the_content();
           
        }
    }
    ?>
        <div class="clear"></div>
    </div><!--END SECTION -->
<?php
    }
    endwhile;
    endif; 
?>

<?php get_footer(); ?>
