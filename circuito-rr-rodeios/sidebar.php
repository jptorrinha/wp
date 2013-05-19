<div id="sidebar">

<!--Busca-->
<div id="busca">
	<div id="title_busca">O que você procura?</div>
    <form role="search" method="get" id="searchform" action="<?php echo get_option('home'); ?>">
    <input value="" name="s" id="s" type="text" class="inp_busca" >
    <input id="searchsubmit" value="" type="submit" class="btn_busca">
    </form>
</div>
<!--End Busca-->
<br/>
<!--Facebook Home-->
<div id="title_busca">Facebook</div>
<div id="facebook">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=369599279721829";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div class="fb-like-box" data-href="http://www.facebook.com/pages/Cia-de-Rodeio-RR/510183042365532" data-width="290" data-show-faces="true" data-colorscheme="light" data-stream="false" data-border-color="#380303" data-header="false"></div>
</div>
<!--End Facebook Home-->

</div>
