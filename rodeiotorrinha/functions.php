<?php
//LIMITAR OS CARACTERES DO THE_EXCERTP() NO WORDPRESS
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

?>