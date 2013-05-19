<div id="dados_autor">
<h1>Dados do Autor</h1>

<span class="avatar"><?php echo get_avatar(get_the_author_id(),80);?></span>

<span class="nome"><?php the_author_firstname();?> <?php the_author_lastname();?></span>

<p><?php the_author_description();?></p>

<a href="<?php the_author_email(); ?>" title="<?php the_author_email(); ?>">EMAIL</a>
<a href="<?php the_author_url(); ?>" title="<?php the_author_url(); ?>">SITE</a>
<a href="<?php bloginfo('url');?>/?author=<?php the_author_id();?>">/BLOG</a>


</div><!--dados_autor-->


<div id="dados_posts">
<h1>Dados desta matéria</h1>

<ul>
   <li><?php the_time('j M Y');?></li>
   <li><?php if(function_exists('the_views')){the_views();}?></li>
   <li><?php comments_popup_link('0 comentário','1 comentário','% Comentários'); ?></li>
   <li><a href="<?php the_Permalink()?>/rss">RSS do ARTIGO</a></li>
   <li class="title">Este post está em:</li>
    <?php the_category();?>
</ul>
</div><!--dados do post-->


<div id="ads_google">
<h1>Publicidade</h1>
<span class="anuncio">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-2744551318668160";
/* BoxSingle_sidebar */
google_ad_slot = "6473236148";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</span>
</div><!--adsgoogle-->


<div id="sidebar_noticias">
<h1>Notícias</h1>
<ul>
	<?php query_posts('showposts=5&category_name=noticias');?>
    <?php if (have_posts()): while (have_posts()) : the_post();?>
                
    <li>
    <h2><a href="<?php the_Permalink()?>"><?php the_title();?></a></h2>
    <span><?php the_time('j M Y');?> / <?php if(function_exists('the_views')){the_views();}?></span>
    <p><a href="#"><?php the_excerpt_rereloaded(20, '');?></a></p>
    </li>
                 
   <?php endwhile; else:?>
 <?php endif;?> 
</ul>
</div><!--adsgoogle-->

