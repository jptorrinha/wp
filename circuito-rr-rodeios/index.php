<?php get_header();?>
<!--ÍNICIO CONTENT-->
<div id="content">
<div id="titulo_destaque">Campeões da Etapa <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></div>
<div id="titulo_video">Videos <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></div>

<div id="box_capeoes">
	<?php query_posts('showposts=1&category_name=campeoes&offset=0');?>
    <?php if (have_posts()): while (have_posts()) : the_post();?>
	<div id="foto_campeao"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { } ?></div>
    <div id="titulo_capeao">1&ordm; <?php the_title();?></div>
    <div id="ranking_final"><?php the_excerpt(); ?></div>
    <div id="ranking_completo"><a href="<?php echo get_settings('home'); ?>/ranking">Ranking Completo</a></div>
	<?php endwhile; else:?>
    <?php endif;?>
</div>

<div id="box_video">
	<?php query_posts('showposts=1&category_name=galeria-de-videos&offset=0');?>
    <?php if (have_posts()): while (have_posts()) : the_post();?>
    <iframe width="320" height="260" src="<?php $key="video";echo get_post_meta($post->ID,$key,true);?>" frameborder="0" allowfullscreen></iframe>
	<?php endwhile; else:?>
    <?php endif;?>
</div>
<!--GALERIA E NOTICIAS HOME-->

    <div id="titulo_galerias">Últimas Galerias <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></div>    
    <div id="titulo_noticias">Twiiter <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></div>
<!--ACORDION GALERIA-->    
    <div id="galerias_home">
        <ul class="accordion">
        <?php query_posts('showposts=3&category_name=galeria-de-fotos&offset=0');?>
        <?php if (have_posts()): while (have_posts()) : the_post();?>
                <li>
                    <a href="<?php the_Permalink()?>" target="_parent"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { } ?></a>
                    <div class="caption"><strong><?php the_title();?></strong><br/><?php echo excerpt('10'); ?></div>
                </li>
	  	<?php endwhile; else:?>
      	<?php endif;?> 
        </ul>
    </div>
<!--END ACORDION GALERIA-->        
<div id="noticias_home">
<a class="twitter-timeline" href="https://twitter.com/fotografoarena" data-widget-id="333324484293562369">Tweets de @fotografoarena</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!--END GALERIA E NOTICIAS HOME-->
</div>
</div>
<!--END CONTENT-->
<?php get_footer();?>