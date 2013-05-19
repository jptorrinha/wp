<?php 

global $root, $var_prefix;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="bra_color" content="<?php echo get_option($var_prefix."color"); ?>" />
<title>
<?php if (is_front_page()){ bloginfo('name'); echo " - "; bloginfo('description'); } else { wp_title(''); echo " - "; bloginfo('name'); } ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php $favicon = get_option($var_prefix.'favicon'); if ( $favicon != '' ) echo ' <link rel="shortcut icon" href="'.$favicon.'" />'; ?>
<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
<meta name="viewport" content="width=device-width" />
<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" />
<?php } ?>
<link rel="stylesheet" id="default_stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php echo get_option($var_prefix."custom_google_font_href"); ?>
<style type="text/css">
<!--
#menu ul li a, .menu ul li a, .section-title .title, .section-title .title a {
 <?php echo get_option($var_prefix."custom_google_font")?>
}
-->
</style>
<style type="text/css">
<!--
 <?php echo get_option($var_prefix."extra_css");
?>
-->
</style>
<?php wp_head(); ?>
<?php if (get_option($var_prefix."ga") != "") {

        echo get_option($var_prefix."ga");  

    } 

    ?>
<?php 

    $slider_height = get_option($var_prefix."slider_height");

    if ($slider_height != "")

    { 

        $slider_height_748 = ceil($slider_height * 748 / 960);

        $slider_height_420 = ceil($slider_height * 420 / 960);

        $slider_height_300 = ceil($slider_height * 300 / 960);

    ?>
<style type="text/css">
<!--
#slideshow-container {
height: <?php echo $slider_height;
?>px;
}
 @media only screen and (min-width: 768px) and (max-width: 959px) {
 #slideshow-container {
height: <?php echo $slider_height_748;
?>px;
}
}
 @media only screen and (min-width: 480px) and (max-width: 767px) {
 #slideshow-container {
height: <?php echo $slider_height_420;
?>px;
}
}
 @media only screen and (min-width: 320px) and (max-width: 479px) {
 #slideshow-container {
height: <?php echo $slider_height_300;
?>px;
}
}
-->
</style>
<?php

    }

    ?>
</head>
<?php

if (get_option($var_prefix."style") == "dark") $extra_path = "/dark"; else $extra_path = "";

?>
<body <?php body_class(); ?> id="top" style="background-image:url('<?php echo $root."/images/pattern$extra_path/"; echo get_option($var_prefix."bg_pattern"); ?>')" onLoad="delay()">
<div id="wrapper">
<!-- START HEADER -->
<div id="header">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Header") ) : endif; ?>
  <div id="logo"> <a href="<?php echo home_url(); ?>"><img src="<?php echo get_option($var_prefix."logo"); ?>" alt="" /></a> </div>
  <!--END LOGO-->
  <div id="menu">
    <ul>
      <li><a href="#top" class="logo"><img src="<?php echo get_option($var_prefix."logo_2")?>" alt="" /></a></li>
      <?php

            if (is_front_page()) $link_prefix = "#"; else $link_prefix = get_option("siteurl")."#";

            $page_args = array('sort_order' => 'ASC', 'sort_column' => 'menu_order');

            $pages = get_pages($page_args); 

            $k = 0;

            foreach ($pages as $pagg) {

                  $separate_page = get_post_meta($pagg->ID, "bra_separate_page", true);

                  $k++;

                  if ($separate_page != "Yes")

                  {

                    if ($k == 1) $option = '<li><a href="' . $link_prefix . 'top">/' . $pagg->post_title . '</a></li> '; 

                    else  $option = '<li><a href="' . $link_prefix . $pagg->post_name . '">/' . $pagg->post_title . '</a></li> '; 

                  }

                  else

                  {

                     $option = '<li><a href="' . get_page_link( $pagg->ID ) . '">/' . $pagg->post_title . '</a></li> '; 

                  }

                  echo $option;

            }
			
            ?>
    <!--        
    </ul>
    <!--END UL
  </div>
  <!--END MENU-->
  <div class="clear"></div>
</div>
<!--END HEADER-->
<!-- END HEADER -->
<?php

// end of header.php

?>
