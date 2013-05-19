<?
/*
Script desenvolvido por João paulo de Oliveira
E-mail: joaopaulo@jpcomunicacao.com.br
&copy; Todos os direitos reservados.
*/
// Limite de caracteres o the_excerpt
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
}
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}

add_theme_support('post-thumbnails');

?>
