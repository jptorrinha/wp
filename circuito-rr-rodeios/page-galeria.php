<?php
/*
Template Name: Galeria
*/
?>
<?php get_header();?>
<!--ÍNICIO CONTENT-->
<div id="content">

<div id="pageFull">

<h1 class="titulo_page">Galeria de Fotos <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></h1>

<?php query_posts('showposts=100&category_name=galeria-de-fotos&offset=0');?>
<?php if (have_posts()): while (have_posts()) : the_post();?>
	<div id="caixa_galeria">
    	<div class="foto_destaque_gal"><a href="<?php the_Permalink()?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { } ?></a></div>
        <div class="data_galeria"><?php the_time('j M Y');?></div>
        <div class="evento_galeria"><a href="<?php the_Permalink()?>"><?php the_title();?></a></div>
        <div class="cidade_galeria"><?php echo excerpt('5'); ?></div>        
    </div>
<?php endwhile; else:?>
<?php endif;?>
        
</div>

<div id="siderbar">
<?php get_sidebar();?>
</div>

</div>
<!--END CONTENT-->
<?php get_footer();?>