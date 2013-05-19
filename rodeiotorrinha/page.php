<?php get_header(); ?>  
<div id="content">
	<div id="slide_home">
    <?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?>
    </div>
    
    <div id="page">
		<?php if (have_posts()): while (have_posts()) : the_post();?>
        <h1 class="titulo_page"><?php the_title();?></h1>
        <?php the_content (); ?>  
        </div>
        <?php endwhile; else:?>
        <?php endif;?>
        <div id="sidebar_page">
        <?php include (TEMPLATEPATH . '/sidebar_redes.php'); ?>
        </div>
    
</div>
<?php get_footer(); ?>