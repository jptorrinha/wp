<?php
$parent_slug_2 = "brankic_admin";
$page_title_2 = "Slider Options";
$menu_title_2 = "Slider";
$capability_2 = "manage_options";
$menu_slug_2 = "brankic_admin_2";
$function_2 = "mytheme_admin2";

$file_dir = get_template_directory_uri();

global $var_prefix;



function mytheme_add_admin2() 
{
global            $parent_slug_2, $page_title_2, $menu_title_2, $capability_2, $menu_slug_2, $function_2;
$hook = add_submenu_page( $parent_slug_2, $page_title_2, $menu_title_2, $capability_2, $menu_slug_2, $function_2);

add_action('admin_print_scripts-' . $hook, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin2");







 

function mytheme_admin2() {

global $menu_slug_2, $page_title_2, $var_prefix; 
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


 
<h2><?php echo $page_title_2; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_2; ?>" method="post">

    <table class="form-table">
    <tbody>
<?php bra_form_text($var_prefix."slider_height", "Slider Height", 100, "350", "Optional but highly recommended", ""); ?>   
    </tbody>
    </table>            
<?php
for ($i = 0 ; $i <= 9 ; $i++)
{
    $ii = $i + 1;
    $iii = $ii + 1; 
?>
<div id="slide_0<?php echo $i; ?>">

    <h3>Slide <?php echo $ii; ?></h3> 
    <table class="form-table">
    <tbody>

    <?php bra_form_upload($var_prefix."slide_0$i", "Slide $ii", "", "Upload file or insert URL", "Upload image", ""); ?> 
    
    <?php bra_form_textarea($var_prefix."slide_not_img_0$i", "Not image content", 400, 4, "", "Embed code or iframe or anything you want", ""); ?>

    <?php bra_form_text($var_prefix."slide_0$i"."_caption", "Slide $ii caption", 400, "", "Insert caption for the slide $ii", ""); ?>

    <?php bra_form_text($var_prefix."slide_0$i"."_link_url", "Slide $ii URL", 400, "", "Insert link URL for the slide $ii", ""); ?>
    </tbody>
    </table>

    <div class="line"></div>     
    <span><a id="add_slide_0<?php echo $ii; ?>" href="javascript:void()">Add slide <?php echo $iii; ?></a></span>
    
</div>
<?php
} // end of $i
?>


 <?php bra_form_submit(); ?> 
</form>
</div> 
 

<?php
}
?>