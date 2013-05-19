<?php
global $root, $post_id;
    the_content();   

$portfolio_style = get_option($var_prefix."portfolio_style");    

$portfolio_with_filters = get_post_meta($post_id, "bra_select_portfolio_category", true);

$termID = $portfolio_with_filters;

if ($portfolio_style == "filterable")
{


$taxonomyName = "portfolio_category";
$termchildren = get_term_children( $termID, $taxonomyName );
?>

<div class="section-nav filterable">
  <ul id="portfolio-nav">
    <li class="current"><a href="#" data-filter="*">Todas</a></li>
    <?php

$k = 0;

foreach ($termchildren as $child) {

    $term = get_term_by( 'id', $child, $taxonomyName );

    $k++;

    ?>
    <li><a href="#" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
    <?php

}

if ($k == 0) 

{

?>
    <script type="text/javascript">

    $(document).ready(function($){

        $('#portfolio-nav').remove();

    });

    </script>
    <?php

}

?>
  </ul>
  <!--END PORTFOLIO-NAV-->
</div>
<!--END SECTION-NAV FILTERABLE-->
<div class="portfolio-grid">
<ul id="thumbs">
<?php

}

else

{

?>
<div class="content">
  <?php if (get_option($var_prefix."portfolio_items") != "-1") { ?>
  <div class="section-nav">
    <div class="page_navigation"></div>
  </div>
  <!--END SECTION-NAV-->
  <?php } ?>
  <div class="portfolio-grid">
    <ul class="paginate">
      <?php

}



$args=array(

    'tax_query' => array(

        array(

            'taxonomy' => 'portfolio_category',

            //'field' => $termID

            'terms' => $termID

        )

    ),

    'post_type' => 'portfolio_item',

    'orderby' => 'date',

    'order' => 'DESC',

    'posts_per_page' => '-1'

    );

  $temp = $wp_query;  // assign orginal query to temp variable for later use   

  //$wp_query = null; making notice about is_singluar not called properly 

  $wp_query = new WP_Query($args); 

  if( have_posts() ) : 

        while ($wp_query->have_posts()) : $wp_query->the_post();

        $featured_images = array();

        

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

        

        // get video url

        $video_url = get_post_meta($post->ID, "bra_video_link", true);

        

        // get the portfolio cats

        $terms = get_the_terms( $post->ID, 'portfolio_category' );                           

        if ( $terms && ! is_wp_error( $terms ) ) : 

            $names = array();

            $slugs = array();

            foreach ( $terms as $term ) {

                $names[] = $term->name;

                $slugs[] = $term->slug;

            }                                

            $name_list = join( ", ", $names );

            $slug_list = join( " ", $slugs ); 

        endif;

  ?>
      <li class="item <?php echo $slug_list; ?>"> <img src="<?php echo $featured_images[0]; ?>" alt="<?php the_title(); ?>" />
        <div class="item-info">
          <h3 class="title"><?php the_title(); ?></h3>
          <h4><?php echo $name_list; ?></h4>
        </div>
        <!--END ITEM-INFO-->
        <div class="item-info-overlay">
          <?php the_excerpt(); ?>
          <a href="<?php the_Permalink()?>" class="view">mais</a>
          <?php

                    if ($video_url != "") 

                    {

                    ?>
          <a title="<?php echo $name_list." - "; the_title(); ?>" href="<?php echo $video_url; ?>" class="preview" rel="prettyPhoto[<?php the_title(); ?>]">preview</a>
          <?php

                    }                    

                    $i = 0;

                    foreach ($featured_images as $image)

                    {

                    ?>
          <a title="<?php echo $name_list." - "; the_title(); ?>" href="<?php echo $image; ?>" <?php if ($i == 0 && $video_url == "") { ?>class="preview"<?php } else {?> style="display:none" <?php } ?> rel="prettyPhoto[<?php the_title(); ?>]">preview</a>
          <?php

                    $i++;

                    }

                    

                    ?>
        </div>
        <!--END ITEM-INFO-OVERLAY-->
      </li>
      <?php

        endwhile;

  endif;

  $wp_query = $temp;  //reset back to original query

?>
    </ul>
    <!--END UL-->
  </div>
  <!--END PORTFOLIO-GRID-->
  <?php 

if ($portfolio_style == "paginate" )     

{

?>
  <div class="clear"></div>
  <?php if (get_option($var_prefix."portfolio_items") != "-1") { ?>
  <div class="page_navigation"></div>
  <?php } ?>
</div>
<!--END CONTENT-->
<?php

}

?>
