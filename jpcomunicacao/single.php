<?php
//$post = $wp_query->post;
/* se for a categoria blog */
if (in_category('blog')) {
include (TEMPLATEPATH.'/single-blog.php');
return;
}
if (in_category('servicos')) {
include (TEMPLATEPATH.'/single-servicos.php');
return;
}

?>