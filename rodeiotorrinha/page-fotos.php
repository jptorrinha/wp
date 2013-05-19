<?php
/*
Template Name: Fotos
*/
get_header(); ?>  
<div id="content">
	<div id="slide_home">
    <?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?>
    </div>
    
    <div id="page">
		
        <h1 class="titulo_page"><?php the_title();?></h1>
        <?php query_posts('showposts=4&category_name=fotos&offset=0');?>
        <?php if (have_posts()): while (have_posts()) : the_post();?>        
    	<div id="show_interno">
        	<div class="img_artista">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <img src="<?php echo get_settings('home'); ?>/<?php $key="fotos";echo get_post_meta($post->ID,$key,true);?>" 
        	alt="<?php the_title();?>" title="<?php the_title();?>" width="200" height="150" border="0"></a>
            </div>
            <div class="titulo_artista">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
			<?php the_title();?></a>
            </div>
            <div class="descr_artista">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <?php the_excerpt(); ?></a>
            </div>
            </div>
			<?php endwhile; else:?>
            <?php endif;?>  
    </div>
        
    <div id="sidebar_page">
        <?php include (TEMPLATEPATH . '/sidebar_redes.php'); ?>
    </div>
    
</div>
<?php get_footer(); ?>