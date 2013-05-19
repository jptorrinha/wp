var root_path = $("#default_stylesheet").attr("href");
root_path = root_path.substr(0, root_path.lastIndexOf("style.css"));

$(document).ready(function() {
	$('select#background').change(function () { 
		var b = $(this).children(":selected").val();
		
		var selected_skin = $("select#skin").children(":selected").val();
		if (selected_skin == "dark") {
			extra_path = "dark/";
		} else {
			extra_path = "";
		}
		
		$('body').css('background-image', "url('" + root_path + "images/pattern/" + extra_path + b + "')");
	});	
	
	$("select#colors").change(function (){
		var color = $(this).children(":selected").val();
	
		var skin = $("select#skin").children(":selected").val();
		if (skin == "") skin = "light";
		$("#css_color_style").remove();
		$("head").append("<link>");
    	css = $("head").children(":last");
    	css.attr({
    		rel:  "stylesheet",
    		type: "text/css",
    		id: "css_color_style",
    		href: root_path + "css/" + skin + "-style-" + color + ".css"
  		});
		
		
		
 	})
	
	$("select#skin").change(function(){
		var skin = $(this).children(":selected").val();
		if (skin != "") {
		
		
			var color = $("select#colors").children(":selected").val();
			if (color == "") color = "blue";
			
			
			$("#css_color_style").remove();
			$("head").append("<link>");
			css = $("head").children(":last");
			css.attr({
				rel:  "stylesheet",
				type: "text/css",
				id: "css_color_style",
				href: root_path + "css/" + skin + "-style-" + color + ".css"
			});
			
			var layout = $("select#layout").children(":selected").val();
			if (layout == "bg-image_boxed" || layout == "boxed"){
			
				$("#css_color_style_boxed").remove();
				$("head").append("<link>");
				css = $("head").children(":last");
				css.attr({
					rel:  "stylesheet",
					type: "text/css",
					id: "css_color_style_boxed",
					href: root_path + "css/style-boxed-" + skin + ".css"
				});		
			}
		}
 	})
	

	$('select#layout').change(function(){ 
		var b = $(this).children(":selected").val();
		if (b == ""){
			
			var bg_img = $("select#background").children(":selected").val();
			if (bg_img == "") bg_img = "bg-1.png";
			
			$("body").css("background-image", "url('" + root_path + "images/pattern/" + bg_img + "')");
    		$("#backstretch").remove();
			$("#css_color_style_boxed").remove();
			
		}
		if (b == "bg-image"){
			
			$("body").css("background-image", "url('" + root_path + "images/alexis-bike.jpg')")
    		$.backstretch(root_path + "images/alexis-bike.jpg");
			$("#css_color_style_boxed").remove();
			
		}
		
		if (b == "bg-image_boxed"){
			
			$("body").css("background-image", "url('" + root_path + "images/alexis-bike.jpg')")
    		$.backstretch(root_path + "images/alexis-bike.jpg");
			var skin = $("select#skin").children(":selected").val();
			if (skin == "") skin = "light";
			$("#css_color_style_boxed").remove();
			$("head").append("<link>");
			css = $("head").children(":last");
			css.attr({
				rel:  "stylesheet",
				type: "text/css",
				id: "css_color_style_boxed",
				href: root_path + "css/style-boxed-" + skin + ".css"
			});
			
		}
		
		if (b == "boxed"){
			var skin = $("select#skin").children(":selected").val();
			if (skin == "") skin = "light";
			$("#backstretch").remove();
			var bg_img = $("select#background").children(":selected").val();
			if (bg_img == "") bg_img = "bg-1.png";
			
			$("body").css("background-image", "url('" + root_path + "images/pattern/" + bg_img + "')");
			$("#css_color_style_boxed").remove();
			$("head").append("<link>");
			css = $("head").children(":last");
			css.attr({
				rel:  "stylesheet",
				type: "text/css",
				id: "css_color_style_boxed",
				href: root_path + "css/style-boxed-" + skin + ".css"
			});
		}
	})





 $("#panel a.open").click(function(){
  var margin_left = $("#panel").css("margin-left");
  if (margin_left == "-210px"){
  $("#panel").animate({marginLeft: "0px"});
 }
 else{
  $("#panel").animate({marginLeft: "-210px"});
 }

 })

}); 