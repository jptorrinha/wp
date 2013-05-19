<?php get_header();?>
<?php get_sidebar();?>
    
      <div id="content">
      
        <div id="content_destaque">
        
          <div id="content_destaque_conteudo">
            <ul>
              <li>
              <?php query_posts('showposts=1&category_name=notícias&offset=1');?>
              <?php if (have_posts()): while (have_posts()) : the_post();?>
              
              <h1><a href="<?php the_Permalink()?>"><?php the_title();?></a></h1>
              
              <?php endwhile; else:?>
              <?php endif;?> 
              </li>
              <li>
                <ul>
                <?php query_posts('showposts=2&category_name=notícias&offset=2');?>
                <?php if (have_posts()): while (have_posts()) : the_post();?>
                
                 <li><a href="<?php the_Permalink()?>"><?php the_title();?></a></li>
                 
                <?php endwhile; else:?>
                <?php endif;?> 
                </ul>
              </li>
              <li>
              <?php query_posts('showposts=1&category_name=notícias&offset=4');?>
              <?php if (have_posts()): while (have_posts()) : the_post();?>
              
                <a href="<?php the_Permalink()?>">
                <img src="<?php echo get_settings('home'); ?>/<?php $key="img";echo get_post_meta($post->ID,$key,true);?>"
                alt="<?php the_title();?>" border="0" width="100" height="50" border="0" />
                </a>
                <p class="lista"><a href="<?php the_Permalink()?>"><?php the_title();?></a></p>
                
              <?php endwhile; else:?>
              <?php endif;?> 
              </li>
            </ul>
          </div><!--content destaque conteudo-->
          
            <div id="content_destaque_destaque">
             <?php query_posts('showposts=1&category_name=notícias');?>
             <?php if (have_posts()): while (have_posts()) : the_post();?>
            
               <span><a href="<?php the_Permalink()?>">Postado em <?php the_time('j M Y');?></a></span>
                 <a href="<?php the_Permalink()?>">
                 <img src="<?php echo get_settings('home'); ?>/<?php $key="img";echo get_post_meta($post->ID,$key,true);?>"
                 alt="<?php the_title();?>" border="0" width="350" height="175" border="0" />
                 </a>
                  <p><a href="<?php the_Permalink()?>"><?php the_title();?></a></p>
                  
             <?php endwhile; else:?>
              <?php endif;?>        
            </div><!--content_destaque_destaque-->
        
        </div><!--content destaque-->
        
          <div id="content_entreterimento">
          
            <div id="content_entreterimento_conteudo">
              <ul>
              <?php query_posts('showposts=2&category_name=entreterimento');?>
              <?php if (have_posts()): while (have_posts()) : the_post();?>
               <li>
                 <a href="<?php the_Permalink()?>">
                 <img src="<?php echo get_settings('home'); ?>/<?php $key="img";echo get_post_meta($post->ID,$key,true);?>"
                 alt="<?php the_title();?>" width="200" height="100" border="0" />
                 </a>
                 <a href="<?php the_Permalink()?>"><?php the_title();?></a>
               </li>
              <?php endwhile; else:?>
              <?php endif;?>                
              </ul>
            </div><!--content entreterimento conteudo-->
            
              <div id="content_entreterimento_anuncio">
               <script type="text/javascript"><!--
               google_ad_client = "pub-6252101946778080";
               /* Página home conteúdo */
               google_ad_slot = "6369250044";
               google_ad_width = 200;
               google_ad_height = 200;
               //-->
               </script>
               <script type="text/javascript"
               src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
               </script>
              </div><!--content entreterimenro anuncio-->
          
          </div><!-- content entreterimento -->
          
            <div id="content_esportes">
            
              <div id="content_esportes_conteudo">
               <ul>
               <?php query_posts('showposts=3&category_name=esportes');?>
               <?php if (have_posts()): while (have_posts()) : the_post();?>
                <li>
                  <a href="<?php the_Permalink()?>">
                  <img src="<?php echo get_settings('home'); ?>/<?php $key="img";echo get_post_meta($post->ID,$key,true);?>"
                  alt="" width="200" height="100" border="0" /></a>
                  <h1>
                  <a href="<?php the_Permalink()?>"><?php $category = get_the_category(); echo $category[1]->cat_name;?></a>
                  </h1>
                  <p><a href="<?php the_Permalink()?>"><?php the_title();?></a></p>
                </li>
              <?php endwhile; else:?>
              <?php endif;?>  
              </ul>             
              </div><!--content esportes conteudo-->
              
                <div id="content_esportes_comentados">
                 <h1 class="especial">+ COMENTADOS</h1>
                  <ol>
                    <?php get_mostcommented(5); ?>               
                  </ol>
                </div><!-- content esportes comentarios-->
            
            </div><!--content esportes-->
            
              <div id="content_tecnologia">
              
                <div id="content_tecnologia_destaque">
                <?php query_posts('showposts=1&category_name=tecnologia');?>
                <?php if (have_posts()): while (have_posts()) : the_post();?>
                  <a href="<?php the_Permalink()?>">
                  <img src="<?php echo get_settings('home'); ?>/<?php $key="img";echo get_post_meta($post->ID,$key,true);?>"
                  alt="<?php the_title();?>" border="0" width="350" height="175" border="0" />
                  </a>
                  <p><a href="<?php the_Permalink()?>"><?php the_title();?></a></p> 
                 <?php endwhile; else:?>
                 <?php endif;?>    
                </div><!--content tecnologia destaque-->
                
                <div id="content_tecnologia_conteudo">
                  <ul>
                  <?php query_posts('showposts=3&category_name=tecnologia&offset=1');?>
                  <?php if (have_posts()): while (have_posts()) : the_post();?>
                   <li><a href="<?php the_Permalink()?>"><?php the_title();?></a></li>
                   <?php endwhile; else:?>
                   <?php endif;?>  
                  </ul>
                </div><!--content tecnologia conteudo-->
              
              </div><!--content tecnologia-->
              
                <div id="content_vistos">
                
                  <div id="content_vistos_conteudo">
                    <h1>+ Vistos</h1>
                    <?php if (function_exists('get_most_viewed')): ?>
                    <ol>
                       <?php get_most_viewed('post', 5); ?>
                    </ol>
                    <?php endif; ?>
                  </div><!--content vistos conteudo-->
                    
                    <h1 class="videos">/vídeos</h1>
                  <div id="content_vistos_anuncio">
                  <?php query_posts('showposts=1&category_name=vídeos');?>
                  <?php if (have_posts()): while (have_posts()) : the_post();?>
                  
                  <?php $key="vga";echo get_post_meta($post->ID,$key,true);?>
                  
                  <?php endwhile; else:?>
                   <?php endif;?>
                  </div><!--Content vistos anuncio-->
                  
                </div><!--content mais vistots-->

      </div><!--content-->

<?php include (TEMPLATEPATH . '/right_sidebar.php'); ?>

<?php get_footer();?>