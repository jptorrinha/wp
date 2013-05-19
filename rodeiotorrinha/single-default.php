<?php get_header(); ?>  
<div id="content">
	<div id="slide_home">
    <?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?>
    </div>
    
    <div id="page">
		<?php if (have_posts()): while (have_posts()) : the_post();?>
        <h1 class="titulo_page"><?php the_title();?></h1>
        <?php the_content (); ?> 
        
        <div id="compartilhe">
        <h2>Gostou da not&iacute;cia compartilhe</h2>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
            <a class="addthis_button_preferred_1"></a>
            <a class="addthis_button_preferred_2"></a>
            <a class="addthis_button_preferred_3"></a>
            <a class="addthis_button_preferred_4"></a>
            <a class="addthis_button_compact"></a>
            <a class="addthis_counter addthis_bubble_style"></a>
            </div>
            <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-5009786d67cbf7a0"></script>
            <!-- AddThis Button END -->
        </div>
        
        </div>
        <?php endwhile; else:?>
        <?php endif;?>
                
        <div id="sidebar_page">
        <?php include (TEMPLATEPATH . '/sidebar_redes.php'); ?>
        </div>
    
</div>
<?php get_footer(); ?>