<?php



$var_prefix = "bra_zig_";

$root = get_template_directory_uri();

$timthumb = $root."/includes/timthumb.php?src=";



include("includes/bra_admin_functions.php");

include("includes/bra_admin.php");

include("includes/bra_admin_2.php"); 

include("includes/bra_admin_3.php");

include("includes/bra_admin_5.php");

include("includes/bra_admin_4.php");

include("includes/pagenavi_bra.php");

include("includes/bra_shortcodes.php");

include("includes/bra_custom_fields.php");

include("includes/previous-and-next-post-in-same-taxonomy.php");



function only_characters($string)

{

    $pattern = '/[^A-Za-z0-9:.\/_-]/';

    $clean = preg_replace($pattern,'',$string);

    return $clean;

}











function no_wpautop($content) 

{ 

        $content = do_shortcode( shortcode_unautop($content) ); 

        $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );

        return $content;

}



function bra_remove_empty_tags($html)

{

$pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/";

return preg_replace($pattern, '', $html);

}



function bra_remove_images($posttext, $echo = true)

{

    $posttext1 = $posttext;

     

    // We will search for the src="" in the post content

    $regular_expression = '~src="[^"]*"~';

    $regular_expression1 = '~<img [^\>]*\ />~';

     

    // WE will grab all the images from the post in an array $allpics using preg_match_all

    preg_match_all( $regular_expression, $posttext, $allpics );

     

    // This time we replace/remove the images from the content

    

    $only_post_text = preg_replace( $regular_expression1, '' , $posttext1);

    $only_post_text = bra_remove_empty_tags($only_post_text);

    

    if ($echo) echo $only_post_text; else return $only_post_text;

}



function bra_get_images($posttext)

{

    // We will search for the src="" in the post content

    $regular_expression = '~src="[^"]*"~';

    $regular_expression1 = '~<img [^\>]*\ />~';

     

    // WE will grab all the images from the post in an array $allpics using preg_match_all

    preg_match_all( $regular_expression, $posttext, $allpics );

     

    // Count the number of images found.

    $NumberOfPics = count($allpics[0]);

    

    $images_src = $allpics[0];

    

    foreach($images_src as $image_src)

    {

        $image = ltrim($image_src, 'src="');

        $image = rtrim($image, '"');

        $images[] = $image;

    } 

    

    if (isset($images)) return $images; else return array();

}







function my_scripts_method() {

    global $root, $post, $var_prefix; 

    

    

    wp_enqueue_style("style", $root."/css/style.css");

    wp_enqueue_style("blog", $root."/css/blog.css");

    wp_enqueue_style("portfolio", $root."/css/portfolio-item.css");

    

    wp_deregister_script('jquery');

    wp_register_script('jquery', ($root."/javascript/jquery.min.js"), false, '1.4.4');

    wp_enqueue_script('jquery');

     

    wp_enqueue_script("custom", $root."/javascript/custom.js");



    wp_enqueue_style("prettyPhoto", $root."/css/prettyPhoto.css");

    wp_enqueue_script("prettyPhoto", $root."/javascript/prettyPhoto.js");

    

    wp_enqueue_script("isotope", $root."/javascript/jquery.isotope.min.js");

    

    wp_enqueue_script("slider-simple", $root."/javascript/slider-simple.js");

    wp_enqueue_style("slider-simple", $root."/css/slider-simple.css");



    wp_enqueue_script("contact-form-validate", $root."/javascript/contact-form-validate.js");

    

    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

    

    if ( is_front_page() ) wp_enqueue_script("smooth-scroll", $root."/javascript/smooth-scroll.js");

    

    //if (get_option($var_prefix."bg_image") != "") 

    //{

        wp_enqueue_script("backstretch", $root."/javascript/jquery.backstretch.min.js");

    //}

    if (get_option($var_prefix."boxed") == "yes") 

    {

        wp_enqueue_style("boxed-css", $root."/css/style-boxed-".get_option($var_prefix."style").".css");

    }

    if (get_option($var_prefix."portfolio_style") == "paginate") 

    {

        wp_enqueue_script("pajinate", $root."/javascript/portfolio-pagination.js");

    }

    

    if (get_option($var_prefix."portfolio_inline") != "no") 

    {

        wp_enqueue_script("portfolio-inline", $root."/javascript/portfolio-inline.js");

    }

    

    if (get_option($var_prefix."show_panel") == "yes") 

    {

        wp_enqueue_script("theme-options", $root."/javascript/theme-option.js");

    }

    

    wp_enqueue_style(get_option("style-".$var_prefix."color"), $root."/css/".get_option($var_prefix."style")."-style-".get_option($var_prefix."color").".css"); 

  

}    

 

add_action('wp_enqueue_scripts', 'my_scripts_method');


/*******************************
Adiciona ação menus personalizados
********************************/
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
register_nav_menus(
array(
'menu-top' => __( 'Menu' ),
//'menu-sidebar' => __( 'Menu Sidebar' ),
//'menu-footer' => __( 'Menu Footer' )
)
);
}






?>