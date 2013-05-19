 <div id="clear"></div><!--clear-->

</div><!--FECHAMENTO DA DIV ID BOX-->
<div id="footer_all">

   <div id="footer">
   <ul>
      <?php $id_da_categoria = get_cat_id('eventos'); $link_da_categoria = get_category_link($id_da_categoria); ?>
      <li><a href="<?php echo $link_da_categoria;?>" class="noticias">/eventos</a></li>
   
      <?php $id_da_categoria = get_cat_id('notícias'); $link_da_categoria = get_category_link($id_da_categoria); ?>
      <li><a href="<?php echo $link_da_categoria;?>" class="noticias">/notícias</a></li>
          
	  <?php $id_da_categoria = get_cat_id('turismo'); $link_da_categoria = get_category_link($id_da_categoria); ?>
      <li><a href="<?php echo $link_da_categoria;?>" class="esportes">/turismo</a></li>
          
	  <?php $id_da_categoria = get_cat_id('entreterimento'); $link_da_categoria = get_category_link($id_da_categoria); ?>
      <li><a href="<?php echo $link_da_categoria;?>" class="entreterimento">/entreterimento</a></li>
          
	  <?php $id_da_categoria = get_cat_id('tecnologia'); $link_da_categoria = get_category_link($id_da_categoria); ?>
      <li><a href="<?php echo $link_da_categoria;?>" class="tecnologia">/cidades</a></li>
  </ul>
   
   
     <div id="footer_txt">
     <p>&copy; Portal InteriorAcontece.com.br<br/>Todos os direitos reservados.<br/>www.interioracontece.com.br
     </div><!--fecha a footer TXT-->

     <div id="footer_redes">
     <p>Siga o portal<br/>InteriorAcontece<br/>
     <div class="logos_redes">
     <a href="https://www.facebook.com/InteriorAcontece"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" border="0" /></a>&nbsp;
     <a href="https://twitter.com/interacontece"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" border="0" /></a> </div>
     </div><!--fecha a footer REDES-->
        
   </div><!--Fecha a Footer-->

</div><!--Fecha a footer ALL-->

<?php wp_footer(); ?>
</body>
</html>