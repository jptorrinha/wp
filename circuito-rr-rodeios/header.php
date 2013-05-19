<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen">
<link href='http://fonts.googleapis.com/css?family=Arbutus+Slab' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
<title>
<?php if (is_home()) { ?>
<?php bloginfo('name'); ?>
<?php } else if (is_category()) { ?>
<?php wp_title(''); ?> - <?php bloginfo('name'); ?>
<?php } else if (is_single() || is_page()) { ?>
<?php wp_title(''); ?> - <?php bloginfo('name'); ?>
<?php } else if (is_archive()) { ?>
<?php  if (is_day()) { ?> <?php echo sprintf(__('Arquivos de %s'), the_time(__('F jS, Y', 'techified'))); ?>
<?php  } elseif (is_month()) { ?>
<?php echo sprintf(__('Arquivos de %s'), the_time(__('F, Y', 'techified'))); ?>
<?php  } elseif (is_year()) { ?>
<?php echo sprintf(__('Arquivos de %s'), the_time(__('Y', 'techified'))); ?>
<?php } ?>
<?php } ?>
</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slide.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/acordion.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.classicAccordion.min.js"></script>
<script language=JavaScript>
<!--
var mensagem="&copy; Circuito RR de Rodeios. Todos os direitos reservados.";
function clickIE() {if (document.all) {(mensagem);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(mensagem);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
// --> 
</script>
</head>

<body>
<div id="header">
<div class="topo">
<div class="container_top">

<div class="logomarca"><a href="<?php echo get_settings('home'); ?>" class="linklogo">
<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" width="200" height="204" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" border="0"></a>
</div>

    <div class="menu">
    <ul>
        <li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
        <?php wp_list_pages('title_li=&exclude=60');?>   
    </ul>
    
	<?php query_posts('showposts=1&category_name=agenda-de-eventos&offset=0');?>
    <?php if (have_posts()): while (have_posts()) : the_post();?>    
    <div id="destaque_top"><a href="<?php the_Permalink()?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { } ?></a></div>
	<?php endwhile; else:?>
    <?php endif;?>
    <?php wp_reset_query(); ?>  
    </div><!-- menu geral -->
    
</div><!-- container_top -->
</div><!-- topo -->
</div><!-- header -->
