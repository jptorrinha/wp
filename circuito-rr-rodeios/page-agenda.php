<?php
/*
Template Name: Agenda
*/
?>
<?php get_header();?>
<!--ÍNICIO CONTENT-->
<div id="content">

<div id="pageFull">

<h1 class="titulo_page"><?php the_title();?> <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></h1>

	<?php query_posts('showposts=1000&category_name=agenda-de-eventos&offset=0');?>
    <?php if (have_posts()): while (have_posts()) : the_post();?>
    
  	<div class="caixa_agenda">
    <div class="foto_agenda"><a href="<?php the_Permalink()?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { } ?></a></div>
	<span class="chamada_agenda"><?php echo excerpt(25); ?></span>
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