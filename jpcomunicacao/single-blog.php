<?php

get_header(); 

wp_reset_query();

global $root, $timthumb; 



if ( have_posts() ) while ( have_posts() ) : the_post();



$comments = comments_open() && get_option("default_comment_status ") == "open";

 

$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );

$featured_image = $featured_image_array[0];



$category = get_the_category(); 

$cat_id = get_cat_ID( $category[0]->cat_name );



?>
<!-- START BLOG POST -->

<div id="blog-post" class="content-wrapper last post-single">
  <div class="divider-heading"></div>
  <div class="section-nav">
    <p>Visit our <a class="button small rounded <?php echo get_option($var_prefix."color"); ?>" href="<?php echo esc_url( get_category_link($cat_id) ); ?>">archive</a></p>
  </div>
  <!--END SECTION-NAV-->
  <div id="inner-content">
    <div class="entry">
      <div class="post-widget">
        <div class="post-meta">
          <h2 class="title">
            <?php the_title(); ?>
          </h2>
          <ul class="comment-date-wrap">
            <?php if ($comments) { ?>
            <li class="link <?php echo get_option($var_prefix."comment_date_style"); ?>">
              <?php comments_popup_link('0', '1', '%'); ?>
            </li>
            <?php } ?>
            <li class="text <?php echo get_option($var_prefix."comment_date_style"); ?>"><span class="day">
              <?php the_time('d')?>
              </span><span class="month">
              <?php the_time('M')?>
              </span></li>
          </ul>
          <!--END COMMENT-DATE-WRAP-->
        </div>
        <!--END POST-META-->
        <div class="post-category">
          <p>Placed in
            <?php the_category(', '); ?>
          </p>
          <p>Tagged with
            <?php the_tags('', ', ', ''); ?>
          </p>
        </div>
        <!--END POST-CATEGORY-->
      </div>
      <!--END POST-WIDGET-->
      <div class="post">
        <?php

                 if ($featured_image != "") 

                 {

                 ?>
        <div class="post-img-holder"><img src="<?php echo $featured_image; ?>" alt="" /></div>
        <?php

                 }

                 ?>
        <div class="post-entry">
          <?php the_content(); ?>
          <div class="clear"></div>
          <?php 

                    if (get_option($var_prefix."share") != "no") include("share.inc.php"); ?>
        </div>
        <!--END POST-ENTRY-->
      </div>
      <!--END POST-->
      <div class="clear"></div>
    </div>
    <!--END ENTRY-->
    <?php if ($comments) comments_template(); ?>
  </div>
  <!--END INNER-CONTENT-->
  <?php get_sidebar(); ?>
</div>
<!--END SECTION #BLOG-->
<!-- END BLOG -->
<?php

endwhile;

?>
<?php get_footer(); ?>
