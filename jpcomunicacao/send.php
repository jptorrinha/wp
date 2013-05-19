<?php

require('../../../wp-blog-header.php');
global $var_prefix, $root;
?>
<?php

$email_to = $_GET["email_to"]; 
$email_from = $_POST["bra_".get_option($var_prefix."email_from")]; 
$subject = $_GET["subject"];
foreach($_POST as $key=>$value)
    {
        $key = ltrim($key, "bra_");
        $text .= "$key - $value<br>";
    }
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
$headers .= "From: <$email_from>" . "\r\n";
mail($email_to, $subject, $text, $headers);
?>
