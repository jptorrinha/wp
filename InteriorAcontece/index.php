<?php get_header();?>
<?php get_sidebar();?>
    
      <div id="content">
      
        <div id="content_destaque">
        
        <div class="titulo_home_chamada">/ÚLTIMAS GALERIAS</div>
        
        <div id="slide">
        <?php if( function_exists('FA_display_slider') ){ FA_display_slider(26); } ?>
        </div>
        
        </div><!--content destaque-->
        
          <div id="content_entreterimento">
          
            <div id="content_entreterimento_conteudo">
            <div class="titulo_home_chamada">/ENTRETENIMENTO</div>
              <ul>
              <?php query_posts('showposts=2&category_name=entretenimento');?>
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
                google_ad_client = "ca-pub-2744551318668160";
                /* BoxInterno_home */
                google_ad_slot = "2327687120";
                google_ad_width = 200;
                google_ad_height = 200;
                //-->
                </script>
                <script type="text/javascript"
                src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                </script>
              </div><!--content entreterimenro anuncio-->
          
          </div><!-- content entreterimento -->
            
              <div id="content_tecnologia">
              <div class="titulo_home_chamada">/NOTÍCIAS</div>
                <div id="content_tecnologia_destaque">
                
                <?php query_posts('showposts=1&category_name=noticias');?>
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
                  <?php query_posts('showposts=3&category_name=noticias&offset=1');?>
                  <?php if (have_posts()): while (have_posts()) : the_post();?>
                   <li><a href="<?php the_Permalink()?>"><?php the_title();?></a></li>
                   <?php endwhile; else:?>
                   <?php endif;?>  
                  </ul>
                </div><!--content tecnologia conteudo-->
              
              </div><!--content tecnologia-->
              
                <div id="content_vistos">
                
                  <div id="content_vistos_conteudo">
                    <h1>+ VISTOS</h1>
                    <?php if (function_exists('get_most_viewed')): ?>
                    <ol>
                       <?php get_most_viewed('post', 10); ?>
                    </ol>
                    <?php endif; ?>
                  </div><!--content vistos conteudo-->
                    
                  <h1 class="eventos">/PRÓXIMOS EVENTOS</h1>
                  <div id="content_proximo_eventos">
                  <?php query_posts('showposts=1&category_name=proximos-eventos');?>
                  <?php if (have_posts()): while (have_posts()) : the_post();?>
                  <a href="<?php the_Permalink()?>">
                  <img src="<?php echo get_settings('home'); ?>/<?php $key="img";echo get_post_meta($post->ID,$key,true);?>" 
                  alt="<?php the_title();?>" border="0" width="300" border="0" /></a>
                  
                  <?php endwhile; else:?>
                   <?php endif;?>
                  </div><!--Content vistos anuncio-->
                  
                </div><!--content mais vistots-->

      </div><!--content-->

<?php include (TEMPLATEPATH . '/right_sidebar.php'); ?>

<?php get_footer();?>