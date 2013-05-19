<?php get_header(); ?>  
<div id="content">
	<div id="slide_home">
    <?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?>
    </div>
    <div id="destaques_home">
    	<div id="destaque_interno">
        <?php query_posts('showposts=1&category_name=rodeio&offset=0');?>
        <?php if (have_posts()): while (have_posts()) : the_post();?>
        	<div class="img_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <img src="<?php echo get_settings('home'); ?>/<?php $key="home";echo get_post_meta($post->ID,$key,true);?>" 
        	alt="<?php the_title();?>" title="<?php the_title();?>" width="220" height="120" border="0"></a>
            </div>
            <div class="titulo_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
			<?php the_title();?></a>
            </div>
            <div class="descr_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <?php the_excerpt(); ?></a>
            </div>
			<?php endwhile; else:?>
            <?php endif;?>  
        </div>
        
    	<div id="destaque_interno">
        <?php query_posts('showposts=1&category_name=rodeio&offset=1');?>
        <?php if (have_posts()): while (have_posts()) : the_post();?>
        	<div class="img_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <img src="<?php echo get_settings('home'); ?>/<?php $key="home";echo get_post_meta($post->ID,$key,true);?>" 
        	alt="<?php the_title();?>" title="<?php the_title();?>" width="220" height="120" border="0"></a>
            </div>
            <div class="titulo_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
			<?php the_title();?></a>
            </div>
            <div class="descr_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <?php the_excerpt(); ?></a>
            </div>
			<?php endwhile; else:?>
            <?php endif;?>  
        </div>
        
    	<div id="destaque_interno">
        <?php query_posts('showposts=1&category_name=rodeio&offset=2');?>
        <?php if (have_posts()): while (have_posts()) : the_post();?>
        	<div class="img_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <img src="<?php echo get_settings('home'); ?>/<?php $key="home";echo get_post_meta($post->ID,$key,true);?>" 
        	alt="<?php the_title();?>" title="<?php the_title();?>" width="220" height="120" border="0"></a>
            </div>
            <div class="titulo_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
			<?php the_title();?></a>
            </div>
            <div class="descr_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
             <?php the_excerpt(); ?></a>
            </div>
			<?php endwhile; else:?>
            <?php endif;?>  
        </div>
        
    	<div id="destaque_interno">
        <?php query_posts('showposts=1&category_name=proibido&offset=0');?>
        <?php if (have_posts()): while (have_posts()) : the_post();?>
        	<div class="img_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <img src="<?php echo get_settings('home'); ?>/<?php $key="proibido";echo get_post_meta($post->ID,$key,true);?>" 
        	alt="<?php the_title();?>" title="<?php the_title();?>" width="220" height="120" border="0"></a>
            </div>
            <div class="titulo_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
			<?php the_title();?></a>
            </div>
            <div class="descr_destaque">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <?php the_excerpt(); ?></a>
            </div>
			<?php endwhile; else:?>
            <?php endif;?>  
        </div>
        
        
    </div>
    <div id="meio_site_02">
    	<div id="noticias_home">
        	<div id="titulo_noticias">Últimas notícias</div>
            <?php query_posts('showposts=3&category_name=noticias&offset=0');?>
            <?php if (have_posts()): while (have_posts()) : the_post();?>
            <div id="noticias_lista">
            <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
            <?php the_time('d/m/Y');?> | <?php the_title();?> - <span class="noticias_chamada" style="font-size: 15px;"><?php echo excerpt(25); ?></span></a>
            </div>
			<?php endwhile; else:?>
            <?php endif;?>             
        </div>
        <!--FACEBOOK-->
        <div id="facebook_home">
            <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FFesta-do-Pe%25C3%25A3o-de-Torrinha%2F176179705784166&amp;width=320&amp;colorscheme=light&amp;connections=10&amp;stream=false&amp;header=false&amp;height=290" scrolling="yes" frameborder="0" style="border:none; overflow:hidden; width:250px; height:290px; background: #ccc;" allowTransparency="false">
    </iframe>
        </div>
        <!--FIM DO FACEBOOK-->
        <!--TWITTER-->
        <div id="twitter_home">
			<script src="http://widgets.twimg.com/j/2/widget.js"></script>
            <script>
            new TWTR.Widget({
              version: 2,
              type: 'profile',
              rpp: 7,
              interval: 6000,
              width: 260,
              height: 200,
              theme: {
                shell: {
                  background: '#333333',
                  color: '#ffffff'
                },
                tweets: {
                  background: '#000000',
                  color: '#ffffff',
                  links: '#8c0a0a'
                }
              },
              features: {
                scrollbar: true,
                loop: false,
                live: false,
                hashtags: true,
                timestamp: true,
                avatars: false,
                behavior: 'all'
              }
            }).render().setUser('rodeiotorrinha').start();
            </script>
        </div>
        <!--FIM DO TWITTER-->
    </div>
</div>
<?php get_footer(); ?>