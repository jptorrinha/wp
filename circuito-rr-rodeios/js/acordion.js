	$(document).ready(function(){
		$('.accordion').classicAccordion({
										 
			width:600, 
			height:300, 
			slideshow:true, 
			distance:5, 
			shadow:false, 
			closePanelOnMouseOut:true, 
			closedPanelSize:50,
			panelProperties:{
			
			}});
	});
//twitter	
      jQuery(function($){
        $(".tweet").tweet({
          join_text: "auto",
          username: "fotografoarena",
          avatar_size: 32,
          count: 4,
          auto_join_text_default: "dissemos,",
          auto_join_text_ed: "nós",
          auto_join_text_ing: "estávamos",
          auto_join_text_reply: "respondemos",
          auto_join_text_url: "verificamos",
          loading_text: "carregando tweets..."
        });
      });
