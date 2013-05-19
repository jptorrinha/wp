<?php
$parent_slug_4 = "brankic_admin";
$page_title_4 = "Contact Page Options";
$menu_title_4 = "Contact Page";
$capability_4 = "manage_options";
$menu_slug_4 = "brankic_admin_4";
$function_4 = "mytheme_admin4";

$file_dir = get_template_directory_uri();

global $var_prefix;



function mytheme_add_admin4() 
{
global            $parent_slug_4, $page_title_4, $menu_title_4, $capability_4, $menu_slug_4, $function_4;
$hook = add_submenu_page( $parent_slug_4, $page_title_4, $menu_title_4, $capability_4, $menu_slug_4, $function_4);

add_action('admin_print_scripts-' . $hook, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin4");







 

function mytheme_admin4() {

global $menu_slug_4, $page_title_4, $var_prefix; 
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


 
<h2><?php echo $page_title_4; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_4; ?>" method="post">


            
<?php
?>

    <h3>Contact page options</h3> 
    
    <table class="form-table">
    <tbody>
    
    <?php bra_form_text($var_prefix."email_to", "Who will receive emails", 400, "", "Insert your email", ""); ?>
    
    <?php bra_form_text($var_prefix."email_from", "Email from field", 400, "", "Insert the caption of your email field", "You must use the same caption as your email field below"); ?>
    
    <?php bra_form_text($var_prefix."email_subject", "Email subject", 400, "", "Insert subject of email", ""); ?>
    
    </tbody>
    </table>
    
    <?php
    
    
    
    for ($i = 1 ; $i <= 5 ; $i++)
    {
    ?>
    <div class="line"></div> 
    <table class="form-table">
    <tbody>
    
    <?php bra_form_select($var_prefix."field_$i", "Field $i", array("" => "Nothing",
                                                                  "text" => "Text", 
                                                                  "select" => "Select",
                                                                  "textarea" => "Textarea"), "", "", ""); ?>
                                                                  
    <?php bra_form_text($var_prefix."field_$i"."_caption", "Field $i caption", 400, "", "Insert caption for the field $i", "field_$i"."_caption"); ?>
    
    <?php bra_form_select($var_prefix."field_$i"."_required", "Field $i required", array("no" => "No", 
                                                                  "yes" => "Yes",
                                                                  "yes_email" => "Yes - Email"), "", "", "field_$i"."_required"); ?>
                                                                  
    <?php bra_form_text($var_prefix."field_$i"."_select", "Field $i select options", 400, "", "Insert options separated by comma", "field_$i"."_select"); ?> 
    </tbody>
    </table>
    
    <?php
    }
    ?>


 <?php bra_form_submit(); ?> 
</form>
</div> 
 

<?php
}
?>