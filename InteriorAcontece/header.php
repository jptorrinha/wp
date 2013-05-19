<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="6m17bVvA3f3LWesNI9AayAmMMOlHI--XelpPRyz1OiU" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php if (is_home()){ bloginfo('name'); }else{ echo '' ; } ?></title>

<?php wp_head(); ?>

<link href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"/></script>
<script type="text/javascript">

  $(function(){
	$("#cadastrar").click(function(){
	   $("#formulario_news").hide("slow");	  
	     beforeSend:$("#carregando_news").show("slow");
		 var email = $("#email").val();
		 $.post("<?php echo get_settings('home'); ?>/newsletter/cadastro.php",{email: email}, function(pegar_retorno){
			complete:$("#carregando_news").hide("slow");
		    $("#retorno").show("slow").html(pegar_retorno);
			$("#voltar").click(function(){
			 $("#retorno").hide("slow");						
			 $("#formulario_news").show("slow");				
			});
		});
    });
  });


</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3812822-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>

<body>
<div id="box">

  <div id="header">
  
    <div id="header_logo">
    
    <a href="<?php echo get_settings('home'); ?>" title="<?php if (is_home()){
	bloginfo('name');
}elseif (is_category()){
	single_cat_title(); echo ' -  ' ; bloginfo('name');
}elseif (is_single()){
	single_post_title();
}elseif (is_page()){
	bloginfo('name'); echo ': '; single_post_title();
}else {
	wp_title('',true);
} ?>"><img src="<?php bloginfo('template_directory'); ?>/images/interior-acontece.png" alt="InteriorAcontece.com.br" border="0" /></a>


    </div><!--fecha header_logo-->
    
      <div id="header_anuncio">
        <!-- LOMADEE - BEGIN -->
        <script type="text/javascript" language="javascript">
            lmd_source="24825143";
            lmd_si="33393039";
            lmd_pu="22262038";
            lmd_c="BR";
            lmd_wi="728";
            lmd_he="90";
        </script>
        <script src="http://image.lomadee.com/js/ad_lomadee.js" type="text/javascript" language="javascript"></script>
        <!-- LOMADEE - END -->
      </div><!--header anuncio-->
      
        <div id="header_search">      
        <form role="search" method="get" id="searchform" action="<?php echo get_option('home'); ?>">
        <span>O Que Você Procura?</span>
          <input value="" name="s" id="s" type="text">
          <input id="searchsubmit" value="" type="submit" class="btn">
        </form>
        </div><!--header search-->
        
        <div id="header_menu">
        <ul class="menu_paginas">
          <li><a href="<?php echo get_settings('home'); ?>">página inicial</a></li>
          <?php wp_list_pages('title_li=');?>
        </ul>
        <ul class="menu_categorias">
          <?php $id_da_categoria = get_cat_id('Eventos'); $link_da_categoria = get_category_link($id_da_categoria); ?>
          <li><a href="<?php echo $link_da_categoria;?>" class="fotos">/eventos</a></li>
        
          <?php $id_da_categoria = get_cat_id('Notícias'); $link_da_categoria = get_category_link($id_da_categoria); ?>
          <li><a href="<?php echo $link_da_categoria;?>" class="noticias">/notícias</a></li>
          
		  <?php $id_da_categoria = get_cat_id('Turismo'); $link_da_categoria = get_category_link($id_da_categoria); ?>
          <li><a href="<?php echo $link_da_categoria;?>" class="turismo">/turismo</a></li>
          
		  <?php $id_da_categoria = get_cat_id('Entretenimento'); $link_da_categoria = get_category_link($id_da_categoria); ?>
          <li><a href="<?php echo $link_da_categoria;?>" class="entreterimento">/entretenimento</a></li>
          
		  <?php $id_da_categoria = get_cat_id('Cidades'); $link_da_categoria = get_category_link($id_da_categoria); ?>
          <li><a href="<?php echo $link_da_categoria;?>" class="cidades">/cidades</a></li>
        </ul>
        </div><!--fecha menu-->
    
</div><!--fecha header-->