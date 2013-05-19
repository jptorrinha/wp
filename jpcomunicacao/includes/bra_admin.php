<?php

global $var_prefix, $root;
 
$page_title = "Zig Zag Global Options";
$menu_title = "Brankic Panel";
$capability = "manage_options";
$menu_slug = "brankic_admin";
$function = "mytheme_admin";
$icon_url =  $root.'/bra_favicon.ico';
$position = "61";

   

function mytheme_add_admin() 
{
global $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position; 
$hook = add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

add_action('admin_print_scripts-' . $hook, 'my_admin_scripts');
}
add_action('admin_menu', 'mytheme_add_admin');



function mytheme_admin() {
 
global $var_prefix, $menu_slug, $root, $page_title; 
$i=0;

?>
<div class='wrap'>
<?php
if (isset($_POST["submit"]))
{
    
if ($_POST["submit"] == "Save Changes")
{
?>
<div class="updated">Options saved</div>
<?php
    foreach($_POST as $key=>$value)
    {
        if (substr($key, 0, 8) == $var_prefix)
        {           
            if (is_array($value))
            {
                $serialized_value = serialize($value);
                update_option($key, $serialized_value);
            }
            else
            {
                $value = str_replace("\\", "", $value); 
                update_option($key, $value);
            }
        }
        
                
    }
} 

}
?>

<h2><?php echo $page_title; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug; ?>" method="post">
<h3>Global Options</h3>
<table class="form-table">
<tbody>
<?php bra_form_upload($var_prefix."logo", "Logo", "$root/images/logo.png", "Logo is placed in the header", "Upload file", "logo"); ?>  
<?php bra_form_upload($var_prefix."logo_2", "Logo 2", "$root/images/logo-min.png", "Logo for fixed menu (doesn't show on tablets and smartphones)", "Upload file", "logo"); ?>
 
<?php bra_form_select($var_prefix."style", "Style", array("light" => "Light", 
                                                          "dark" => "Dark", 
                                                          "grey" => "Grey"), "", "Style", ""); ?>
                                                          
<?php bra_form_select($var_prefix."color", "Color", array("blue" => "Blue", 
                                                          "cream" => "Cream", 
                                                          "green" => "Green", 
                                                          "magenta" => "Magenta", 
                                                          "navyblue" => "Navy Blue", 
                                                          "orange" => "Orange", 
                                                          "pink" => "Pink", 
                                                          "purple" => "Purple", 
                                                          "red" => "Red", 
                                                          "tealgreen" => "Teal Green",
                                                          "yellow" => "Yellow"), "", "Color", ""); ?>
                                                                                  
<?php bra_form_select($var_prefix."bg_pattern", "Background Pattern", array("" => "",
                                                                            "bg-1.png" => "Grid 1", 
                                                                            "bg-4.png" => "Grid 2", 
                                                                            "bg-6.png" => "Grid 3", 
                                                                            "bg-2.png" => "Stripes", 
                                                                            "bg-5.png" => "Stripes 2", 
                                                                            "bg-7.png" => "Stripes 3", 
                                                                            "bg-3.png" => "Crossed Stripes", 
                                                                            "bg-8.png" => "Small Squares", 
                                                                            "bg-9.png" => "Horizontal Lines", 
                                                                            "bg-10.png" => "Vertical Lines"), "", "Patern", ""); ?>
                                                                            
<?php bra_form_select($var_prefix."boxed", "Boxed style", array("no" => "No", 
                                                                "yes" => "Yes"), "", "", ""); ?>                                                                            
                                                                            
<?php bra_form_upload($var_prefix."bg_image", "Stretched background image", "", "", "Upload file", ""); ?>                                                                             

<?php bra_form_upload($var_prefix."favicon", "Favicon", "$root/bra_favicon.ico", ".ico format only", "Upload favicon", ""); ?>

<?php bra_form_text($var_prefix."custom_google_font", "Google Font Family", 500, "font-family: 'Yanone Kaffeesatz', arial, serif;", "Go to Google Web Fonts web page and grab the code between h1 { and }", ""); ?>
<?php bra_form_text($var_prefix."custom_google_font_href", "URL for Google Font", 500, "<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>", "Go to Google Web Fonts web page", ""); ?>

 <?php bra_form_textarea($var_prefix."extra_javascript", "Extra JavaScript", 500, 4, "", "Define some extra javascript code", ""); ?>
<?php bra_form_textarea($var_prefix."extra_css", "Extra CSS", 500, 4, "", "Define some extra CSS styles", ""); ?> 

<?php bra_form_textarea($var_prefix."ga", "Google Analytics tracking code", 500, 4, "", "Insert your Google Analytics tracking code (whole code)", ""); ?>

<?php bra_form_select($var_prefix."show_panel", "Show Panel", array("no" => "No", 
                                                                "yes" => "Yes"), "", "Show panel with style options (like on our live preview)", ""); ?>

</tbody>
</table>

<?php bra_form_submit(); ?> 


</form>
</div> 
<?php
}
?>