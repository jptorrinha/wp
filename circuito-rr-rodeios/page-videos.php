<?php
/*
Template Name: Videos
*/
?>
<?php get_header();?>
<!--ÍNICIO CONTENT-->
<div id="content">

<div id="pageFull">

<h1 class="titulo_page"><?php the_title();?> <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></h1>

	<?php query_posts('showposts=1000&category_name=galeria-de-videos&offset=0');?>
    <?php if (have_posts()): while (have_posts()) : the_post();?>
    
  	<div class="titulo_video"><a href="<?php the_Permalink()?>" title="<?php the_title();?>"><?php the_title();?></a></div>
    
    <?php the_content();?>  
               
	<?php endwhile; else:?>
    <?php endif;?>
</div>

<div id="siderbar">
<?php get_sidebar();?>
</div>

</div>
<!--END CONTENT-->
<?php get_footer();?>