<div id="right_sidebar">
  
           <div id="sidebar_newsletter">
           
             <h1 class="sidebar_newsletter">/newsletter</h1>
               <div id="formulario_news">
                 <label>
                   <input type="text" name="email" id="email" />
                   <input type="submit" value="Cadastrar" id="cadastrar" class="btn" />
                   <span>Seu e-mail</span>
                 </label>
               </div><!--formulario_news-->
                 
                 <div id="carregando_news" style="padding:10px; float:left; display:none;">
                 <img src="<?php bloginfo('template_directory'); ?>/images/ajax-loader.gif" alt="" /> Aguarde, enviando...
                 </div><!--carregando news-->
                 <div id="retorno" style="padding:10px; float:left; border:1px solid #0F0; background:#C1FFD1; width:168px; display:none;
                                          font:14px 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight:bold; color:#333;">
                 </div><!--retorno-->
                 
           
           </div><!--sidebar newsletter-->
           
             <div id="sidebar_enquete">
                           
                <h1 class="sidebar_enquete">/Enquete</h1>
                  <?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
                    <ul>
                     <li><?php get_poll();?></li>
                    </ul>
                  <?php endif; ?> 
             
             </div><!--sidebar enquete-->
             
             <div id="sidebar_siganos">
               <h1 class="sidebar_siganos">/siga o Portal</h1>
                 <ul>                 
                  <li><a href="https://twitter.com/interacontece" target="_blank">
                  <img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Siganos no Twitter" /></a></li>
                  
                  <li><a href="https://www.facebook.com/InteriorAcontece" target="_blank">
                  <img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Siganos no Facebook" /></a>
                  </li>
                 </ul>             
             </div><!--sidebar siganos-->
               <div id="sidebar_publicidade">
                 <h1 class="sidebar_equipe">/PUBLICIDADE</h1>
		 		 <a href="http://www.pralana.com.br/" target="_blank">
                 <img src="<?php bloginfo('template_directory'); ?>/publicidade/anuncio-pralana.jpg" width="180" height="90" />
		         </a>
                 <img src="<?php bloginfo('template_directory'); ?>/publicidade/anuncie.jpg" width="180" height="90" />
                 <img src="<?php bloginfo('template_directory'); ?>/publicidade/anuncie.jpg" width="180" height="90" />
                 <img src="<?php bloginfo('template_directory'); ?>/publicidade/anuncie.jpg" width="180" height="90" />
                 <img src="<?php bloginfo('template_directory'); ?>/publicidade/anuncie.jpg" width="180" height="90" />
                 <img src="<?php bloginfo('template_directory'); ?>/publicidade/anuncie.jpg" width="180" height="90" />
               </div><!--sidebar_equipe-->
			   
</div><!--right sidebar-->