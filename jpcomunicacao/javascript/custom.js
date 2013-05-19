var root_path = $("#default_stylesheet").attr("href");
root_path_url = root_path.substr(0, root_path.lastIndexOf("wp-content"));

/***************************************************
	  PINNED NAVIGATION
***************************************************/
function element_positions(section){
	var element_y = new Array();
	$(section).each(function(i){
		element_y[i] = parseInt($(this).position().top);
		//alert(i + " " + element_y[i]);
	})
	element_y[element_y.length] = parseInt($("#footer").position().top);
	return element_y;
}

function where(section){
	var offset_y = f_scrollTop();
	var element_y = new Array();
	element_y = element_positions(section);
	var h_prev = 0;
	for(i = 1 ; i <= element_y.length ; i++ ){
		var j = i + 1;
		var h = element_y[i];
	
		if (offset_y > (h_prev - 200) && offset_y < h){
			var section_id = $(".content-wrapper:nth-child(" + j + ")").attr("id");
			var is_animated = $(":not('.slide'):animated").length;
			if (!is_animated){
				$("#menu ul li a, .menu ul li a").removeClass("current");
				$("#menu ul li a[href=#" + section_id + "], .menu ul li a[href=#" + section_id + "]").addClass("current");
			}
		}
		h_prev = h;	
	}
}

jQuery(document).ready(function($){
		
	$("#menu ul li a, .menu ul li a").click(function(){
		$("#menu ul li a, .menu ul li a").removeClass("current");
		$(this).addClass("current");
	})
	

	
	var win_width = parseInt($("html, body").width());
	var offset_y = f_scrollTop();
	
	if (offset_y > 100 && ($("#menu").hasClass("")) && (win_width > 960) && !is_tablet() ){
		$("#menu").addClass("pinned");
		if ($("#wpadminbar").length > 0) {
			$(".pinned").css("top", "28px");
		}
	}
	
	if (win_width <= 960 || is_tablet() ){
		$menu = $("#menu").clone();
		$(".content-wrapper:gt(0)").prepend("<div class='menu'>" + $menu.html() + "</div>");
		//$(".content-wrapper:gt(0) .menu ul").prepend("<li><a href='#top'>home</a></li>");
		$(".menu li a.logo").closest("li").remove();
		
		
		
		

		$(".menu ul li a, #menu ul li a").click(function(){	  
			$(".menu ul li a, #menu ul li a").removeClass("current");
			var href = $(this).attr("href");
			$(".menu ul li a[href='" + href + "']").addClass("current");
			$(".menu ul li a[href='#top']").removeClass("current");
		})
		
		
	}
	
	
						   
	$(window).scroll(function () {  
		where(".content-wrapper");
		
		var nav_h = parseInt($("#menu").outerHeight());
    	var offset_y = f_scrollTop();
		
		var win_width = parseInt($("html, body").width());
		
		if (win_width > 960 && !is_tablet()){
			$(".menu").remove();
			if (offset_y > 100){
			  
				if (!$("#menu").hasClass("pinned")){
					$("#menu").fadeOut(function(){
						$("#menu").addClass("pinned").slideDown("slow");
						if ($("#wpadminbar").length > 0) {
							$(".pinned").css("top", "28px");
						}
						
					})
				}	  
			}
			else{
				if ($("#menu").hasClass("pinned")){
					$("#menu").slideUp(function(){
						$("#menu").removeClass("pinned").fadeIn();
					});
				}
			}
		}
		else{
			$(".menu").remove();
			$menu = $("#menu").clone();
			$(".content-wrapper:gt(0)").prepend("<div class='menu'>" + $menu.html() + "</div>");
			//$(".content-wrapper:gt(0) .menu ul").prepend("<li><a href='#top'>home</a></li>");
			$(".menu li a.logo").closest("li").remove();
			
			//if (is_tablet()){
				$(".menu ul li a, #menu ul li a").click(function(){	  
					$(".menu ul li a, #menu ul li a").removeClass("current");
					var href = $(this).attr("href");
					$(".menu ul li a[href='" + href + "']").addClass("current");
					$(".menu ul li a[href='#top']").removeClass("current");
				})
			//}
		}
    });

	


});



/***************************************************
	 ADDITIONAL FUNCTIONS FOR PINNED NAVIGATION
***************************************************/
function f_scrollTop() {
	return f_filterResults (
		window.pageYOffset ? window.pageYOffset : 0,
		document.documentElement ? document.documentElement.scrollTop : 0,
		document.body ? document.body.scrollTop : 0
	);
}
function f_filterResults(n_win, n_docel, n_body) {
	var n_result = n_win ? n_win : 0;
	if (n_docel && (!n_result || (n_result > n_docel)))
		n_result = n_docel;
	return n_body && (!n_result || (n_result > n_body)) ? n_body : n_result;
}

function is_tablet(){
		if (navigator.userAgent.match(/Android/i) ||
	    navigator.userAgent.match(/webOS/i) ||
	    navigator.userAgent.match(/iPhone/i) ||
	    navigator.userAgent.match(/iPod/i) ||
	    navigator.userAgent.match(/iPad/i)) return true; else return false;
}

/***************************************************
	    PORTFOLIO ITEM IMAGE HOVER
***************************************************/
$(document).ready(function(){
						   
	$(".portfolio-grid ul li .item-info-overlay").hide();
	
	if( is_tablet() ){
		$(".portfolio-grid ul li").click(function(){
												  
			var count_before = $(this).closest("li").prevAll("li").length;
			
			var this_opacity = $(this).find(".item-info-overlay").css("opacity");
			var this_display = $(this).find(".item-info-overlay").css("display");
			
			
			if ((this_opacity == 0) || (this_display == "none")) {
				$(this).find(".item-info-overlay").fadeTo(250, 1.0);
			} else {
				$(this).find(".item-info-overlay").fadeTo(250, 0);
			}
			
			$(this).closest("ul").find("li:lt(" + count_before + ") .item-info-overlay").fadeTo(250, 0);
			$(this).closest("ul").find("li:gt(" + count_before + ") .item-info-overlay").fadeTo(250, 0);	

		});	

	}
	else{	
			$(".portfolio-grid ul li").hover(function(){
				$(this).find(".item-info-overlay").fadeTo(250, 1.0);
				}, function() {
					$(this).find(".item-info-overlay").fadeTo(250, 0);		
			});
		
		}

	
	
	
});




/***************************************************
	  DUPLICATE H3 & H4 IN PORTFOLIO
***************************************************/
$(document).ready(function($){
						  
	$(".item-info").each(function(i){
		$(this).next().prepend($(this).html())
	});
});









/***************************************************
	     TOGGLE STYLE
***************************************************/
jQuery(document).ready(function($) {
								
	$(".toggle-container").hide(); 
	$(".trigger").toggle(function(){
		$(this).addClass("active");
		}, function () {
		$(this).removeClass("active");
	});
	$(".trigger").click(function(){
		$(this).next(".toggle-container").slideToggle();
	});
});




/***************************************************
	     ACCORDION
***************************************************/
$(document).ready(function(){	
	$('.trigger-button').click(function() {
		$(".trigger-button").removeClass("active")
	 	$('.accordion').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).next().slideDown('normal');
			$(this).addClass("active");
		 } 
	 });
	$('.accordion').hide();
});




/***************************************************
	    FLICKR ICON IMAGE HOVER
***************************************************/
$(function() {
$('.flickr_badge_image img').animate({ opacity: 0.7}, 0) ;
$('.flickr_badge_image img').each(function() {
$(this).hover(
function() {
$(this).stop().animate({ opacity: 1.0 }, 200);
},
function() {
$(this).stop().animate({ opacity: 0.7 }, 200);
})
});
});	


/***************************************************
	   HIDDEN FOOTER CONTENT ADDITIONAL CODE
***************************************************/
jQuery(document).ready(function($){

	$(".trigger-footer a").click(function(){
		if ($(".trigger-footer a").html() == "View more stuff"){
			$(".trigger-footer a").html("View less stuff");
		}
		else{
			$(".trigger-footer a").html("View more stuff");
		}
		var bottom_h = parseInt($("#footer-bottom").height() + 30);
		$(".footer-content-wrapper").css("bottom", bottom_h)
		$(".footer-content-wrapper").slideToggle("fast");
		$(this).toggleClass("active");
		return false;
	});
});


/***************************************************
	  ARCHIVE PAGE TABS
***************************************************/
$(document).ready(function($){

	$('.archive-list > div').slideUp();
	$('#archive-nav li a').click(function(){
		var li_ord = $(this).parent().prevAll().length;
		var li_ord_plus = li_ord + 1;		
		if ($('.archive-list div:nth-child(' + li_ord_plus + ')').css("display") == "none"){			
			$('.archive-list div:visible').slideUp();
			$('.archive-list div:nth-child(' + li_ord_plus + ')').slideDown();
		}
		else{
			$('.archive-list div:visible').slideUp();
		}				
		return false;
	})

});



/***************************************************
	  Archive TWEAKS
***************************************************/
$(document).ready(function($){
	var year_ = "";
	$('#months ul li').each(function(i){
		if ( (i % 9) == 0 && i > 0) $("#months").append("</ul><ul>"); 										  
		var li_a_url = $(this).find("a").attr("href");
		var li_a_html = $(this).find("a").html();
		var year_start = li_a_html.lastIndexOf(" ");
		var year = li_a_html.substr(year_start);
		$(this).find("a").remove();
		var li_no_posts = $(this).html();
		li_no_posts = li_no_posts.replace("&nbsp;(", "");
		li_no_posts = li_no_posts.replace(")", "");

		$(this).remove();
		if (year != year_) $("#months ul:last").append("<li><strong>" + year + "</strong></li>");
		$("#months ul:last").append("<li><a href='" + li_a_url + "'>" + li_a_html + "<span>" + li_no_posts + "</span></a></li>");
		year_ = year;
	});
	
	$("#categories ul li").each(function(j){
		var span = $(this).find("span").html();
		$(this).find("span").remove();
		$(this).find("a").append("<span>" + span + "</span>");
	})
	
});

/***************************************************
	  Check path
***************************************************/
$(document).ready(function($){
	$('.check_path').each(function(){
		var icon_path = $(this).attr("src");
		if (icon_path.substr(0, 10) == "wp-content") {
			$(this).attr("src", root_path_url + ""+ icon_path);
		}
	});
});

/***************************************************
	  Some TWEAKS
***************************************************/
$(document).ready(function($){
	$('h6.title_to_hide').remove();
	$('#sidebar input#s').css("width", "128px");
	$('#sidebar #search').css("margin-bottom", "30px");
	$("li.all").hide();
	var bra_color = $("meta[name=bra_color]").attr("content");
	$("a.comment-reply-link").addClass("button small rounded " + bra_color);
	$(".widget ul").addClass("post-list");
	$(".content-wrapper").last().addClass("last");
	$(".content-wrapper").first().css("padding", "0px");
});



function delay() {
	var urllocation = location.href;
	if(urllocation.indexOf("#") > -1){
		anchor_link = urllocation.substr(urllocation.indexOf("#") + 1);
		window.location.hash=anchor_link; 
	} else {
	return false;
	}
}

