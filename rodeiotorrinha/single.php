<?php
$post = $wp_query->post;
/* se for a categoria blog */
if (in_category('shows')) {
include (TEMPLATEPATH.'/single-show.php');
return;
}
/* se n�o for nenhuma das categorias acima */
else { ?>
<? include (TEMPLATEPATH.'/single-default.php'); ?>
<?php } ?>