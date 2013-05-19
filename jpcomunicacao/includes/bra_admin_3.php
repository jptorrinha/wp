<?php
$parent_slug_3 = "brankic_admin";
$page_title_3 = "Blog Options";
$menu_title_3 = "Blog";
$capability_3 = "manage_options";
$menu_slug_3 = "brankic_admin_3";
$function_3 = "mytheme_admin3";

$file_dir = get_template_directory_uri();

global $var_prefix;



function mytheme_add_admin3() 
{
global            $parent_slug_3, $page_title_3, $menu_title_3, $capability_3, $menu_slug_3, $function_3;
$hook = add_submenu_page( $parent_slug_3, $page_title_3, $menu_title_3, $capability_3, $menu_slug_3, $function_3);

add_action('admin_print_scripts-' . $hook, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin3");







 

function mytheme_admin3() {

global $menu_slug_3, $page_title_3, $var_prefix; 
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


 
<h2><?php echo $page_title_3; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_3; ?>" method="post">


            
<?php
?>

    <h3>Blog options</h3> 
    <table class="form-table">
    <tbody>
    
    <?php bra_form_select($var_prefix."comment_date_style", "Comment and Date data style", array("rounded" => "Rounded", 
                                                                                                 "" => "Rectangle"), "", "", ""); ?>
                                                                                                 
    <?php bra_form_text($var_prefix."blog_no_posts", "Number of posts", 50, "8", "Number of posts showed in blog section.", ""); ?>
    
    <?php bra_form_select($var_prefix."share", "Show share box under each post", array("yes" => "Yes", 
                                                                                       "no" => "No"), "", "", ""); ?>

    </tbody>
    </table>



 <?php bra_form_submit(); ?> 
</form>
</div> 
 

<?php
}
?>