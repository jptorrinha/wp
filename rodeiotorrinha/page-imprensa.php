<?php
/*
Template Name: Imprensa
*/
get_header(); ?>  
<div id="content">
	<div id="slide_home">
    <?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?>
    </div>
    
    <div id="page">
		<?php if (have_posts()): while (have_posts()) : the_post();?>
        <h1 class="titulo_page">Imprensa</h1>
        <?php the_content (); ?>  
    </div>
        <?php endwhile; else:?>
        <?php endif;?>
    <div id="sidebar_page">
        <?php include (TEMPLATEPATH . '/sidebar_redes.php'); ?>
    </div>
    
    <div id="noticias_imprensa">
    
    <div class="titulo_imprensa">&Uacute;ltimas Not&iacute;cias</div>
		<?php query_posts('showposts=1000&category_name=noticias&offset=0');?>
        <?php if (have_posts()): while (have_posts()) : the_post();?>
        
	<div class="titulo_noticias">
        <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
		<?php the_time('d/m/Y');?> | <?php the_title();?> - <span class="noticias_chamada" style="font-size: 15px;"><?php echo excerpt(25); ?></span></a></div>
               
		<?php endwhile; else:?>
        <?php endif;?>         
    </div>

    
</div>
<?php get_footer(); ?>