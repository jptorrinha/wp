<?php get_header();?>

    <div id="category">
      <ul>
        <?php if (have_posts()): while (have_posts()) : the_post();?>
        <li>
        <a href="<?php the_Permalink()?>">
          <?php
           $key="img";
           $img = get_post_meta($post->ID,$key,true);
           if(isset($img) && $img >= '1'){ ?> 
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>" alt="<?php the_title();?>">
            <img src="<?php echo get_option('home');?>/<?php $key="img";echo get_post_meta($post->ID,$key,true);?>"
            title="<?php the_title();?>" alt="<?php the_title();?>" width="200px" height="100px"></a>
          <?php }else{}?>
        </a>
        
          <span class="titulo"><a href="<?php the_Permalink()?>"><?php the_title();?></a></span>
          <span class="meta">
           <strong>Postado em:</strong> <?php the_time('j M Y');?> |
           <strong>Por:</strong> <?php the_author_posts_link();?> |
		   <?php comments_popup_link('0 comentário','1 comentário','% Comentários'); ?> |
           <?php if(function_exists('the_views')){the_views();}?>
          </span>
           
          
          
          <p><a href="#"><?php the_excerpt_rereloaded(30, '');?></a></p>
          
         </li>    
        <?php endwhile; else:?>
        <h1>Desculpe não encontramos o que você procura! Você pode tentar outros termos! o Portal <a href="<?php echo get_option('home');?>" style="color:#333;">InteriorAcontece</a> Agradece!</h1>
        <?php endif;?>
       </ul>
       <div class="paginator"><?php wp_pagenavi(); ?></div><!--paginator-->                
    </div><!--category-->

<div id="single_sidebar">
<?php include (TEMPLATEPATH . '/cat_sidebar.php'); ?>
</div><!--single_sidebar-->

<?php get_footer();?>