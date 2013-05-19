    <div id="sidebar_left">
      <h1 class="galeria">/eventos</h1>
        <ul>
          <?php
		  $id_da_categoria = get_cat_id('eventos');
		  wp_list_categories('sort_column=name&child_of='."$id_da_categoria".'&title_li='); ?>
        </ul>
    
      <h1 class="noticias">/notícias</h1>
        <ul>
          <?php
		  $id_da_categoria = get_cat_id('noticias');
		  wp_list_categories('sort_column=name&child_of='."$id_da_categoria".'&title_li='); ?>
        </ul>
        
      <h1 class="esportes">/turismo</h1>
        <ul>
          <?php
		  $id_da_categoria = get_cat_id('turismo');
		  wp_list_categories('sort_column=name&child_of='."$id_da_categoria".'&title_li='); ?>
        </ul>
        
      <h1 class="entreterimento">/entretenimento</h1>
        <ul>
          <?php
		  $id_da_categoria = get_cat_id('Entretenimento');
		  wp_list_categories('sort_column=name&child_of='."$id_da_categoria".'&title_li='); ?>
        </ul>
       
       <h1 class="cidades">/cidades</h1>
        <ul>
          <?php
		  $id_da_categoria = get_cat_id('cidades');
		  wp_list_categories('sort_column=name&child_of='."$id_da_categoria".'&title_li='); ?>
        </ul>
        
        <div id="left_adsence">
		<img src="<?php bloginfo('template_directory'); ?>/publicidade/anuncio-cia123-lateral.jpg" />
		</div><!--FECHA O ANUNCIO ADSENSE LEFT
        
        -->        
    </div><!--fecha sidebar left-->