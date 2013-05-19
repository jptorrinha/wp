<div id="sidebar">

    <?php 
    //global $page_id;
    //$sidebar = get_post_meta($page_id, 'bra_select_sidebar', true); 
    //if ($sidebar == "") $sidebar = "Default";
    $sidebar = "Default";
    
    if ( function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar) ) : else :
    
    ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

    	<?php get_search_form(); ?>
    
        <div class="widget">
        <h3 class="heading-title">Default sidebar</h3>
	    <p>You are using default sidebar without widgets. Please populate it in your admin dashboard</p>
        </div>
	<?php endif; ?>

</div><!--END sidebar-->
