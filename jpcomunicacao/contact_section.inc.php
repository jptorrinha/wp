<?php

global $root, $post_id, $var_prefix;
$bra_contact_page_field_1 = get_option($var_prefix."field_1");
$bra_contact_page_field_1_title = get_option($var_prefix."field_1_caption");
$bra_contact_page_field_1_required = get_option($var_prefix."field_1_required");
$bra_contact_page_field_1_select = get_option($var_prefix."field_1_select");

$bra_contact_page_field_2 = get_option($var_prefix."field_2");
$bra_contact_page_field_2_title = get_option($var_prefix."field_2_caption");
$bra_contact_page_field_2_required = get_option($var_prefix."field_2_required");
$bra_contact_page_field_2_select = get_option($var_prefix."field_2_select");

$bra_contact_page_field_3 = get_option($var_prefix."field_3");
$bra_contact_page_field_3_title = get_option($var_prefix."field_3_caption");
$bra_contact_page_field_3_required = get_option($var_prefix."field_3_required");
$bra_contact_page_field_3_select = get_option($var_prefix."field_3_select");

$bra_contact_page_field_4 = get_option($var_prefix."field_4");
$bra_contact_page_field_4_title = get_option($var_prefix."field_4_caption");
$bra_contact_page_field_4_required = get_option($var_prefix."field_4_required");
$bra_contact_page_field_4_select = get_option($var_prefix."field_4_select");

$bra_contact_page_field_5 = get_option($var_prefix."field_5");
$bra_contact_page_field_5_title = get_option($var_prefix."field_5_caption");
$bra_contact_page_field_5_required = get_option($var_prefix."field_5_required");
$bra_contact_page_field_5_select = get_option($var_prefix."field_5_select");    
?>

<form action="<?php echo $root; ?>/send.php?email_to=<?php echo get_option($var_prefix."email_to"); ?>&subject=<?php echo get_option($var_prefix."email_subject"); ?>" id="contact-form" class="form" method="post">
    <ul>
        <?php
        bra_contact_page_create_field($bra_contact_page_field_1, $bra_contact_page_field_1_title, $bra_contact_page_field_1_required, $bra_contact_page_field_1_select);     
        bra_contact_page_create_field($bra_contact_page_field_2, $bra_contact_page_field_2_title, $bra_contact_page_field_2_required, $bra_contact_page_field_2_select);
        bra_contact_page_create_field($bra_contact_page_field_3, $bra_contact_page_field_3_title, $bra_contact_page_field_3_required, $bra_contact_page_field_3_select);
        bra_contact_page_create_field($bra_contact_page_field_4, $bra_contact_page_field_4_title, $bra_contact_page_field_4_required, $bra_contact_page_field_4_select);
        bra_contact_page_create_field($bra_contact_page_field_5, $bra_contact_page_field_5_title, $bra_contact_page_field_5_required, $bra_contact_page_field_5_select);
        ?>
        <li class="submit-button">
            <input name="submit" id="submitted" value="Send Message" class="submit" type="submit" />
        </li>
    </ul>
</form><!--END CONTACT FORM-->
