<?php get_header();?>
<?php get_sidebar();?>

  <div id="content">
  
    <div id="page">
        <?php if (have_posts()): while (have_posts()) : the_post();?>
        
          <span class="titulo"><?php the_title();?></span>
          
          <?php the_content();?>
        
        
        
        
        <?php endwhile; else:?>
        <?php endif;?>                
    </div><!--page-->

</div><!--content-->

<?php include (TEMPLATEPATH . '/right_sidebar.php'); ?>

<?php get_footer();?>