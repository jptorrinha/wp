<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if (is_home()) { ?>
<?php bloginfo('name'); ?>
<?php } else if (is_category()) { ?>
<?php wp_title(''); ?> 
<?php } else if (is_single() || is_page()) { ?>
<?php wp_title(''); ?> - <?php bloginfo('name'); ?>
<?php } else if (is_archive()) { ?>
<?php  if (is_day()) { ?> <?php echo sprintf(__('Arquivos de %s'), the_time(__('F jS, Y', 'techified'))); ?>
<?php  } elseif (is_month()) { ?>
<?php echo sprintf(__('Arquivos de %s'), the_time(__('F, Y', 'techified'))); ?>
<?php  } elseif (is_year()) { ?>
<?php echo sprintf(__('Arquivos de %s'), the_time(__('Y', 'techified'))); ?>
<?php } ?>
<?php } ?></title>
<link href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<?php wp_head(); ?>
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header">

	<div id="master">
    <img src="<?php bloginfo('template_directory'); ?>/images/logo-masters.png" width="260" height="230" border="0"
    title="Logomarca patrocinador master do Rodeio de Torrinha" alt="Logomarca patrocinador master do Rodeio de Torrinha" />
    </div>
    
   
    <div id="logomarca">
    <a href="<?php echo get_settings('home'); ?>" title="Logomarca Rodeio de Torrinha">
    <img src="<?php bloginfo('template_directory'); ?>/images/logomarca-rodeio-torrinha.png" width="235" height="235" border="0"
    title="Logomarca Rodeio de Torrinha" alt="Logomarca Rodeio de Torrinha" /></a>
    </div>
    
    <div id="premios">
    <img src="<?php bloginfo('template_directory'); ?>/images/placa-de-madeira-premios.png" width="280" height="230" border="0" 
    title="Premiação Rodeio de Torrinha" alt="Premiação Rodeio de Torrinha" />
    </div>
</div>
<div id="navbar">
	
    	<li><a href="<?php echo get_settings('home'); ?>" title="<?php the_title();?>">Home</a></li>
        <li><a href="<?php echo get_settings('home'); ?>/sobre-a-festa" title="<?php the_title();?>">A Festa</a></li>
        <li><a href="<?php echo get_settings('home'); ?>/shows" title="<?php the_title();?>">Shows</a></li>
        <li><a href="<?php echo get_settings('home'); ?>/estrutura" title="<?php the_title();?>">Estrutura</a></li>
        <li><a href="<?php echo get_settings('home'); ?>/camarotes" title="<?php the_title();?>">Camarotes</a></li>
        <li><a href="<?php echo get_settings('home'); ?>/ingressos" title="<?php the_title();?>">Ingressos</a></li>
        <li><a href="<?php echo get_settings('home'); ?>/fotos" title="<?php the_title();?>">Fotos</a></li>
        <li><a href="<?php echo get_settings('home'); ?>/imprensa" title="<?php the_title();?>">Imprensa</a></li>
        <li><a href="<?php echo get_settings('home'); ?>/contato" title="<?php the_title();?>">Contato</a></li>
    
</div>
