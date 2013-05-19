<?php get_header();?>
<!--ÍNICIO CONTENT-->
<div id="content">

<div id="pageFull">

<?php if (have_posts()): while (have_posts()) : the_post();?>
<h1 class="titulo_page"><?php the_title();?> <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></h1>

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