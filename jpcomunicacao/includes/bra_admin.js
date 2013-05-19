jQuery(document).ready(function($) {						
								
$("#bra_zig_bg_image_show img").css("width", "400px");
	
////////////	
// SLIDER //
////////////
	$('[id^="slide_"]').hide();
	
	$("#slide_00").show();
	
	for (i = 1 ; i <= 9 ; i++)
	{
		var slide_img = $("#bra_zig_slide_0" + i).attr("value");
		var slide_not_img = $("#bra_zig_slide_not_img_0" + i).attr("value");
		if (slide_img != "" || slide_not_img != "") {
			$("#slide_0" + i).show();
			$("#add_slide_0" + i).hide();
		}
	}
	
	$('[id^="add_slide_"]').click(function() {
		$(this).hide();										   
	    var i_d = $(this).attr('id');
		var i_d_no = i_d.slice(10);
		var div_to_open = "#slide_" + i_d_no;
		$(div_to_open).slideDown();
        return false;
    });
	
	$("[id^='slide_'] img").css("width", "400px");
	
    field_id = "#tr_bra_zig_bg_pattern select";
	value = $(field_id).attr('value'); 

	$("#tr_bra_zig_bg_pattern").css("background-image", "url('../wp-content/themes/zigzagwp/images/pattern/" + value + "')");
	$(field_id).change(function()
	{
	   value = $(this).attr('value');
	   $("#tr_bra_zig_bg_pattern").css("background-image", "url('../wp-content/themes/zigzagwp/images/pattern/" + value + "')");
		
	});
	
	for (i = 1 ; i <= 5 ; i++){
		field_id = "#bra_zig_field_" + i;
		
		$(".field_" + i + "_caption").hide();
		$(".field_" + i + "_required").hide();
		$(".field_" + i + "_select").hide();
		
		value = $(field_id).attr('value');
		
		if (value != "") {
			$(".field_" + i + "_caption").show();
			$(".field_" + i + "_required").show();
		}
		if (value == "select") $(".field_" + i + "_select").show();

	}
	
	field_id = "#bra_zig_field_1";
	$(field_id).change(function()
	{
	   value = $(this).attr('value');
	   if (value == "select") {
		   $(".field_1_select").show();
		   $(".field_1_caption").show();
		   $(".field_1_required").show();
	   }
	   if (value == "text") {
		   $(".field_1_select").hide();
		   $(".field_1_caption").show();
		   $(".field_1_required").show();
	   }
	   if (value == "textarea") {
		   $(".field_1_select").hide();
		   $(".field_1_caption").show();
		   $(".field_1_required").show();
	   }
	   if (value == "") {
		   $(".field_1_select").hide();
		   $(".field_1_caption").hide();
		   $(".field_1_required").hide();
	   }	
	});
	
	field_id = "#bra_zig_field_2";
	$(field_id).change(function()
	{
	   value = $(this).attr('value');
	   if (value == "select") {
		   $(".field_2_select").show();
		   $(".field_2_caption").show();
		   $(".field_2_required").show();
	   }
	   if (value == "text") {
		   $(".field_2_select").hide();
		   $(".field_2_caption").show();
		   $(".field_2_required").show();
	   }
	   if (value == "textarea") {
		   $(".field_2_select").hide();
		   $(".field_2_caption").show();
		   $(".field_2_required").show();
	   }
	   if (value == "") {
		   $(".field_2_select").hide();
		   $(".field_2_caption").hide();
		   $(".field_2_required").hide();
	   }	
	});
	
	field_id = "#bra_zig_field_3";
	$(field_id).change(function()
	{
	   value = $(this).attr('value');
	   if (value == "select") {
		   $(".field_3_select").show();
		   $(".field_3_caption").show();
		   $(".field_3_required").show();
	   }
	   if (value == "text") {
		   $(".field_3_select").hide();
		   $(".field_3_caption").show();
		   $(".field_3_required").show();
	   }
	   if (value == "textarea") {
		   $(".field_3_select").hide();
		   $(".field_3_caption").show();
		   $(".field_3_required").show();
	   }
	   if (value == "") {
		   $(".field_3_select").hide();
		   $(".field_3_caption").hide();
		   $(".field_3_required").hide();
	   }	
	});
	field_id = "#bra_zig_field_4";
	$(field_id).change(function()
	{
	   value = $(this).attr('value');
	   if (value == "select") {
		   $(".field_4_select").show();
		   $(".field_4_caption").show();
		   $(".field_4_required").show();
	   }
	   if (value == "text") {
		   $(".field_4_select").hide();
		   $(".field_4_caption").show();
		   $(".field_4_required").show();
	   }
	   if (value == "textarea") {
		   $(".field_4_select").hide();
		   $(".field_4_caption").show();
		   $(".field_4_required").show();
	   }
	   if (value == "") {
		   $(".field_4_select").hide();
		   $(".field_4_caption").hide();
		   $(".field_4_required").hide();
	   }	
	});
	
	field_id = "#bra_zig_field_5";
	$(field_id).change(function()
	{
	   value = $(this).attr('value');
	   if (value == "select") {
		   $(".field_5_select").show();
		   $(".field_5_caption").show();
		   $(".field_5_required").show();
	   }
	   if (value == "text") {
		   $(".field_5_select").hide();
		   $(".field_5_caption").show();
		   $(".field_5_required").show();
	   }
	   if (value == "textarea") {
		   $(".field_5_select").hide();
		   $(".field_5_caption").show();
		   $(".field_5_required").show();
	   }
	   if (value == "") {
		   $(".field_5_select").hide();
		   $(".field_5_caption").hide();
		   $(".field_5_required").hide();
	   }	
	});
	

	field_id = "#bra_zig_portfolio_style";
	value = $(field_id).attr('value');
	if (value == "paginate") {
		$(".paginate_options").show();
	} else {
		$(".paginate_options").hide();
	}
	
	$(field_id).change(function(){
		value = $(this).attr('value');
		if (value == "paginate") {
			$(".paginate_options").show();
		} else {
			$(".paginate_options").hide();
		}
	})

});