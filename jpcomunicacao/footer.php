<?php 
global $root, $var_prefix; 
?>

<!-- START FOOTER -->

<div id="footer">
        
    <div class="footer-content-wrapper">            
            
        <div class="footer-content">
        <?php
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_1st_box") ) : endif; 
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_2nd_box") ) : endif; 
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_3rd_box") ) : endif; 
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_4th_box") ) : endif; 
        ?>        
  
        </div><!--END FOOTER-CONTENT-->
    </div><!--END FOOTER-CONTENT-WRAPPER-->
        
    
    <div id="footer-bottom">
                
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) : endif; ?>  
                
        <div class="one-third trigger-footer last">
            <p><a class="" href="#"><?php _e("View more stuff"); ?></a></p>
        </div><!--END ONE-THIRD TRIGGER-FOOTER LAST-->
    </div><!--END FOOTER-BOTTOM-->
    
</div><!--END FOOTER-->

<!-- END FOOTER -->

</div><!--END WRAPPER-->

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function($){
<?php
if (get_option($var_prefix."bg_image") != "") 
{
?>
    $("body").css("background-image", "url(<?php echo get_option($var_prefix."bg_image"); ?>)")
    $.backstretch("<?php echo get_option($var_prefix."bg_image"); ?>");
<?php
}
if (get_option($var_prefix."portfolio_style") == "paginate")
{
?>   
    $('.paginate').closest(".content-wrapper").pajinate({
        items_per_page : <?php echo get_option($var_prefix."portfolio_items"); ?>    
    });    

<?php
}
?>
}) 
<?php echo get_option($var_prefix."extra_javascript"); ?>
</script>   

<?php
if (get_option($var_prefix."show_panel") == "yes") 
{
?>
<!-- Theme Option --> 

<div id="panel" style="margin-left:-210px;">      
    <div id="panel-admin">
        <strong>Background pattern</strong> <br />    
        <select id="background">
          <option value="">--</option>
          <option value="bg-1.png">Grid 1</option>
          <option value="bg-4.png">Grid 2</option>
          <option value="bg-6.png">Grid 3</option>
          <option value="bg-2.png">Stripes 1</option>
          <option value="bg-5.png">Stripes 2</option>
          <option value="bg-7.png">Stripes 3</option>
          <option value="bg-3.png">Crossed stripes</option>
          <option value="bg-8.png">Small Squares</option>
          <option value="bg-9.png">Horizontal Lines</option>
          <option value="bg-10.png">Vertical Lines</option>
        </select>
        <strong>Colors</strong> <br />
        <select id="colors">
          <option value="">--</option>
          <option value="blue">Blue</option>
          <option value="navyblue">Navyblue</option>
          <option value="orange">Orange</option>
          <option value="yellow">Yellow</option>
          <option value="green">Green</option>
          <option value="tealgreen">Tealgreen</option>
          <option value="red">Red</option>
          <option value="pink">Pink</option>
          <option value="purple">Purple</option>
          <option value="magenta">Magenta</option>
          <option value="cream">Cream</option>
        </select>
        <strong>Skin</strong> <br />
        <select id="skin">
          <option value="">--</option>
          <option value="light">Light</option>
          <option value="grey">Grey</option>
          <option value="dark">Dark</option>
        </select>        
        <strong>Layout style</strong> <br />
        <select id="layout">
          <option value="">Streched</option>
          <!--<option value="bg-image">Background image</option>-->
          <option value="boxed">Boxed</option>
          <option value="bg-image_boxed">Background image</option> 
        </select>        
    </div><!--PANEL-ADMIN-->        
    <a class="open" href="#"></a>
</div><!--PANEL-->
<?php
}
?>
</body>
</html>