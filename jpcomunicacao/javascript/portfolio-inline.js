var root_path = $("#default_stylesheet").attr("href");
root_path = root_path.substr(0, root_path.lastIndexOf("style.css"));
var img_html = "<img class='preloader' src='" + root_path + "images/loading.gif'>";


function slider(){
	$('#portfolio-slider').slides({
		preload: true,
		hoverPause: true,
		autoHeight: true,
		generateNextPrev: true,
		slideSpeed: 1000,
		play: 3500
	});
}

function slide_empty_portfolio_item(container_id){
	$(container_id).slideUp(600, function(){
		$(container_id).empty();
	});
}

function close_portfolio_item_function(container_id){
	$("li.all a").click(function(){
		slide_empty_portfolio_item(container_id);
		$("ul#thumbs li, ul.paginate li").removeClass("active_item");
		$("ul#thumbs li .item-info-overlay, ul.paginate li .item-info-overlay").fadeTo(250, 0);
		return false;
	})
}



function show_item_inline(url, container_id, portfolio_id, speed, direction){

	var id_class = $(portfolio_id).attr("class");

	if (id_class == "isotope"){
		portfolio_id = $(portfolio_id).closest(".content-wrapper").attr("id");	
		portfolio_id = "#" + portfolio_id;

		var ord = $("ul#thumbs li.active_item").prevAll().length + 1;

		if (direction == "next") ord = ord - 1;
		else ord = ord + 1;
		$("ul#thumbs li .item-info-overlay").fadeTo(250, 0);
		$("ul#thumbs li").removeClass("active_item");
		//$("ul#thumbs li:nth-child(" + ord + ")").addClass("active_item");
		
	} else {
		portfolio_id = $(portfolio_id).closest(".content-wrapper").attr("id");	
		portfolio_id = "#" + portfolio_id;

		var ord = $("ul.paginate li.active_item").prevAll().length + 1;

		if (direction == "next") ord = ord - 1;
		if (direction == "prev") ord = ord + 1;
		$("ul.paginate li .item-info-overlay").fadeTo(250, 0);
		$("ul.paginate li").removeClass("active_item");
		//$("ul.paginate li:nth-child(" + ord + ")").addClass("active_item");	
	}
	
	
	win_y = parseInt($(portfolio_id).offset().top);
	var tag_element = "html";
	if ($.browser.safari) tag_element = "body"; 
	$(tag_element).animate({scrollTop: win_y}, function(){
		$(container_id).slideUp(speed, function(){
			$(container_id).empty();
			$(portfolio_id).find(".portfolio-grid").prev().before(img_html);
			
			$(container_id).load(url, function(){
				$(".preloader").remove();
				
				$(container_id).slideDown(speed, function(){
					slider();
					var title = $(".item-details h1").html();
					var $active_li = $(".portfolio-grid li.item img[alt='" + title + "']").closest("li");
					$active_li.addClass("active_item");
				});

				close_portfolio_item_function(container_id);
				
				
		
				
			});
		
		
		});
		
		
		
	});
	

}





jQuery(document).ready(function($){
	$("li.all").show();
		
	$("#thumbs a.view, ul.paginate a.view, .view2").click(function(){
		var section_id = "#" + $(this).closest(".content-wrapper").attr("id");
		if ($("#portfolio-item-wrapper-container").length > 0){
			slide_empty_portfolio_item();
		}
		$("ul#thumbs li, ul.paginate li").removeClass("active_item");
		$(this).closest("li").addClass("active_item");
		if ($("#portfolio-item-wrapper-container").length < 1){
			if ($(section_id + " .divider-heading").length < 1) {
				$(section_id).prepend("<div id='portfolio-item-wrapper-container' style='display:none'></div>");
			} else {
				$(section_id).find(".divider-heading").after("<div id='portfolio-item-wrapper-container' style='display:none'></div>");
			}
		}
		var url = $(this).attr("href") + " #portfolio-item-wrapper";						        show_item_inline(url, "#portfolio-item-wrapper-container", section_id, 600, "");					
	return false
	})
});
