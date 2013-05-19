<?php
$parent_slug_5 = "brankic_admin";
$page_title_5 = "Portfolio Options";
$menu_title_5 = "Portfolio";
$capability_5 = "manage_options";
$menu_slug_5 = "brankic_admin_5";
$function_5 = "mytheme_admin5";

$file_dir = get_template_directory_uri();

global $var_prefix;



function mytheme_add_admin5() 
{
global            $parent_slug_5, $page_title_5, $menu_title_5, $capability_5, $menu_slug_5, $function_5;
$hook = add_submenu_page( $parent_slug_5, $page_title_5, $menu_title_5, $capability_5, $menu_slug_5, $function_5);

add_action('admin_print_scripts-' . $hook, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin5");







 

function mytheme_admin5() {

global $menu_slug_5, $page_title_5, $var_prefix; 
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


 
<h2><?php echo $page_title_5; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_5; ?>" method="post">


            
<?php
?>

    <h5>Portfolio options</h5> 
    <table class="form-table">
    <tbody>
    
    <?php bra_form_select($var_prefix."portfolio_inline", "Open portfolio single inline (on same page", array("no" => "No",
                                                                                          "yes" => "Yes"), "", "Portfolio single item will be opened on home page", ""); ?>
    
    <?php bra_form_select($var_prefix."portfolio_style", "Portfolio section style", array("filterable" => "Filterable",
                                                                                          "paginate" => "Paginate"), "", "", ""); ?>
    
    <?php bra_form_text($var_prefix."portfolio_items", "Number of items per section", 50, "-1", "-1 for all (no paginate).", "paginate_options"); ?>

    </tbody>
    </table>



 <?php bra_form_submit(); ?> 
</form>
</div> 
 

<?php
}
?>