<?php get_header();?>

    <div id="single">

        <?php if (have_posts()): while (have_posts()) : the_post();?>
        
          <span class="titulo"><?php the_title();?></span>
                   
          <?php the_content();?>
          
        <span class="tags">
        <h3> Gostou? Compartilhe</h3>
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style ">
        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
        <a class="addthis_button_tweet"></a>
        <a class="addthis_button_pinterest_pinit"></a>
        <a class="addthis_counter addthis_pill_style"></a>
        </div>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-503a228154f65835"></script>
        <!-- AddThis Button END -->
        </span>              
                
          <span class="comentarios"><?php comments_template(); ?></span>
        
        <?php endwhile; else:?>
        <?php endif;?>                
    </div><!--single-->

<div id="single_sidebar">
<?php include (TEMPLATEPATH . '/single_sidebar.php'); ?>
</div><!--single sidebar-->

<?php get_footer();?>