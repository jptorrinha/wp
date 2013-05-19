<?php

get_header(); 

wp_reset_query();

global $root, $timthumb; 



if ( have_posts() ) while ( have_posts() ) : the_post();



$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );

$featured_image = $featured_image_array[0];



global $post;



$post_name = $post->post_name;

    

$post_id = get_the_ID();



?>

<div class="content-wrapper" id="<?php echo $post_name; ?>" style="margin-top:0px; padding-top:0px;">
  <div class="section-title">
    <div class="two-third">
      <h1 class="title">
        <?php the_title(); ?>
      </h1>
      <?php

            if (has_excerpt())

            {

            ?>
      <p><?php echo get_the_excerpt(); ?></p>
      <?php

            }

            ?>
    </div>
    <!--END TWO-THIRD-->
  </div>
  <!--END SECTION TITLE-->
  <div class="divider-heading"></div>
  <div class="clear"></div>
  <?php

    if (get_post_meta($post_id, "bra_insert_something", true) == "contact_form")

    {

    ?>
  <div class="one-half">
    <?php the_content(); ?>
  </div>
  <!--END ONE-HALF-->
  <div class="one-half last">
    <?php include("contact_section.inc.php"); ?>
  </div>
  <!--END ONE-HALF LAST-->
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
</div>
<!--END content-wrapper -->
<?php

endwhile;

?>
<?php get_footer(); ?>
