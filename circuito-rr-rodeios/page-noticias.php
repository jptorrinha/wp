<?php
/*
Template Name: Not&iacute;cias
*/
?>
<?php get_header();?>
<!--ÍNICIO CONTENT-->
<div id="content">

<div id="pageFull">

<h1 class="titulo_page"><?php the_title();?> <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></h1>

	<?php query_posts('showposts=1000&category_name=noticias&offset=0');?>
    <?php if (have_posts()): while (have_posts()) : the_post();?>
    
  	<div class="titulo_noticias">    
    <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
	<?php the_time('d/m/Y');?> | <?php the_title();?> - <span class="noticias_chamada" style="font-size: 15px; font-weight: normal;"><?php echo excerpt(25); ?></span></a>
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