// closure to avoid namespace collision
(function(){
	// creates the plugin
	tinymce.create('tinymce.plugins.shortcodes_options', {
		// creates control instances based on the control's id.
		// our button's id is "brankic_shortcodes_button"
		createControl : function(id, controlManager) {
			if (id == 'brankic_shortcodes_button') {
				// creates the button
					
				var button = controlManager.createButton('brankic_shortcodes_button', {
					title : 'Shortcodes', // title of the button
					image : '../wp-content/themes/zigzagwp/includes/bra_shortcodes.ico',
					
					onclick : function() {
						
						var shortcodes_visible = jQuery("#bra_shortcodes_menu_holder").length;
						
						if (shortcodes_visible){
							jQuery("#bra_shortcodes_menu_holder").remove();
						}
						else{
							jQuery("#content_toolbargroup").append("<div id='bra_shortcodes_menu_holder'></div>");							

						
						
                 	

                       	

						
                        jQuery('#bra_shortcodes_menu_holder').load('../wp-content/themes/zigzagwp/includes/bra_shortcodes_popup.html#bra_shortodes_popup', function(){


							var y = parseInt(jQuery("#content_brankic_shortcodes_button").offset().top) - 25;	
							var x = parseInt(jQuery("#content_brankic_shortcodes_button").offset().left) - parseInt(jQuery("#adminmenuwrap").width()) + 10;
							jQuery("#bra_shortcodes_menu_holder").css({top: y, left: x})
						
							jQuery("#close_bra_shortcodes_popup").click(function(){
								jQuery("#bra_shortcodes_menu_holder").remove();
							});
							
							
							jQuery("#Bra_graph_container").click(function(){
                                var shortcode = "[bra_graph_container]delete this text and insert graph bars[/bra_graph_container]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#Bra_graph").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Sliding Graph', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_graph-form' );                            
                            })
							

							jQuery("#Bra_team_member").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Team member', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_team_member-form' );                            
                            })
							
							jQuery("#Bra_icon_boxes").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Icon boxes', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_icon_boxes-form' );                            
                            })
							
							jQuery("#Bra_boxed_text").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Boxed text', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_boxed_text-form' );                            
                            })
							
							jQuery("#Bra_divider").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Divider shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_divider-form' );                            
                            })
							
							jQuery("#Bra_border_divider").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Border divider shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_border_divider-form' );                            
                            })
							
							jQuery("#Bra_buttons").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Buttons shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_buttons-form' );                            
                            })
							
							jQuery("#Bra_highlights").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Highlighted text shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_highlights-form' );                            
                            })
							
							jQuery("#Bra_blockquotes").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Blockquote shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_blockquotes-form' );                            
                            })
							
							jQuery("#Bra_toggle").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Toggle element shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_toggle-form' );                            
                            })
							
							jQuery("#Bra_1-3x1-3x1-3").click(function(){
                                var shortcode = "[one_third]<h4>Dummy</h4> Content[/one_third] [one_third]<h4>Dummy</h4> Content[/one_third] [one_third_last]<h4>Dummy</h4> Content[/one_third_last]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#Bra_1-3x2-3").click(function(){
                                var shortcode = "[one_third]<h4>Dummy</h4> Content[/one_third] [two_thirds_last]<h4>Dummy</h4> Content[/two_thirds_last]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#Bra_2-3x1-3").click(function(){
                                var shortcode = "[two_thirds]<h4>Dummy</h4> Content[/two_thirds] [one_third_last]<h4>Dummy</h4> Content[/one_third_last] "
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#Bra_1-2x1-2").click(function(){
                                var shortcode = "[one_half]<h4>Dummy</h4> Content[/one_half] [one_half_last]<h4>Dummy</h4> Content[/one_half_last]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#Bra_1-4x1-4x1-4x1-4").click(function(){
                                var shortcode = "[one_fourth]<h4>Dummy</h4> Content[/one_fourth] [one_fourth]<h4>Dummy</h4> Content[/one_fourth] [one_fourth]<h4>Dummy</h4> Content[/one_fourth] [one_fourth_last]<h4>Dummy</h4> Content[/one_fourth_last]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							

							
							
							
							
							
                        }) // end of jQuery('#bra_shortcodes_menu_holder').load
                       
					   } //end of else (if visible) 

					} // end of var button = controlManager.createButton('brankic_shortcodes_button' onClick
				}); // end of var button = controlManager.createButton('brankic_shortcodes_button', {
				
				return button;
			} // end of if (id == 'brankic_shortcodes_button') {

			return null;
		} // end of createControl : function(id, controlManager) {
	});	// end of tinymce.create('tinymce.plugins.shortcodes_options', {
		
	// registers the plugin. DON'T MISS THIS STEP!!!
	tinymce.PluginManager.add('shortcodes_options', tinymce.plugins.shortcodes_options);
	
								
	
	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked


		
/////////////////////
//      GRAPH      //
/////////////////////
		var name0 = 'graph';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_template.php?name=" + name0 + "&fields[]=Title&fields[]=Percent&defaults[]=Graph&defaults[]=55&types[]=text&types[]=text&descriptions[]=Insert title&descriptions[]=Insert percent to fill bar&submit=Insert graph", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button

		    form.find('#shortcodes_' + name0 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    'Title'    : 'Graph',
					'Percent'  : '55'
				    };
			    var shortcode = '[bra_' + name0;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name0 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});
		
/////////////////////
//  TEAM MEMBER    //
/////////////////////
		var name1 = 'team_member';
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_team_member.php", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name1 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				

			    
			    
					var Name = table.find('#shortcodes_' + name1 + '-Name').val();
				    var Position = table.find('#shortcodes_' + name1 + '-Position').val();
					var Last = table.find('#shortcodes_' + name1 + '-Last').val();
					var Contact_Icon_0 = table.find('#shortcodes_' + name1 + '-Contact_Icon_0').val();
					var Contact_Icon_URL_0 = table.find('#shortcodes_' + name1 + '-Contact_Icon_URL_0').val();
					var Contact_Icon_1 = table.find('#shortcodes_' + name1 + '-Contact_Icon_1').val();
					var Contact_Icon_URL_1 = table.find('#shortcodes_' + name1 + '-Contact_Icon_URL_1').val();
					var Contact_Icon_2 = table.find('#shortcodes_' + name1 + '-Contact_Icon_2').val();
					var Contact_Icon_URL_2 = table.find('#shortcodes_' + name1 + '-Contact_Icon_URL_2').val();
					var Contact_Icon_3 = table.find('#shortcodes_' + name1 + '-Contact_Icon_3').val();
					var Contact_Icon_URL_3 = table.find('#shortcodes_' + name1 + '-Contact_Icon_URL_3').val();
					
					var About = table.find('#shortcodes_' + name1 + '-About').val();

					var shortcode = '[bra_team_member';
					shortcode += ' name="' + Name + '"';
					shortcode += ' position="' + Position + '"';
					shortcode += ' last="' + Last + '"';
					

					
					if (Contact_Icon_0 != "") shortcode += ' contact_icon_0="' + Contact_Icon_0 + '"';
					if (Contact_Icon_URL_0 != "") shortcode += ' contact_icon_url_0="' + Contact_Icon_URL_0 + '"';
					if (Contact_Icon_1 != "") shortcode += ' contact_icon_1="' + Contact_Icon_1 + '"';
					if (Contact_Icon_URL_1 != "") shortcode += ' contact_icon_url_1="' + Contact_Icon_URL_1 + '"';
					if (Contact_Icon_2 != "") shortcode += ' contact_icon_2="' + Contact_Icon_2 + '"';
					if (Contact_Icon_URL_2 != "") shortcode += ' contact_icon_url_2="' + Contact_Icon_URL_2 + '"';
					if (Contact_Icon_3 != "") shortcode += ' contact_icon_3="' + Contact_Icon_3 + '"';
					if (Contact_Icon_URL_3 != "") shortcode += ' contact_icon_url_3="' + Contact_Icon_URL_3 + '"'; 
			    	shortcode += ']';
					shortcode += About;
					shortcode += '[/bra_team_member]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});		


/////////////////////
//   ICON BOXES    //
/////////////////////
		var name2 = 'icon_boxes';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_icon_boxes.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name2 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				


					var Icon_0 = table.find('#shortcodes_' + name2 + '-Icon_0').val();
					var Url_0 = table.find('#shortcodes_' + name2 + '-Url_0').val();
					var Caption_0 = table.find('#shortcodes_' + name2 + '-Caption_0').val();
					var About_0 = table.find('#shortcodes_' + name2 + '-About_0').val();
					
					var Icon_1 = table.find('#shortcodes_' + name2 + '-Icon_1').val();
					var Url_1 = table.find('#shortcodes_' + name2 + '-Url_1').val();
					var Caption_1 = table.find('#shortcodes_' + name2 + '-Caption_1').val();
					var About_1 = table.find('#shortcodes_' + name2 + '-About_1').val();
					
					var Icon_2 = table.find('#shortcodes_' + name2 + '-Icon_2').val();
					var Url_2 = table.find('#shortcodes_' + name2 + '-Url_2').val();
					var Caption_2 = table.find('#shortcodes_' + name2 + '-Caption_2').val();
					var About_2 = table.find('#shortcodes_' + name2 + '-About_2').val();
					
					var Icon_3 = table.find('#shortcodes_' + name2 + '-Icon_3').val();
					var Url_3 = table.find('#shortcodes_' + name2 + '-Url_3').val();
					var Caption_3 = table.find('#shortcodes_' + name2 + '-Caption_3').val();
					var About_3 = table.find('#shortcodes_' + name2 + '-About_3').val();

					var shortcode = '[bra_icon_boxes_container]';
					
					shortcode += ' [bra_icon_box icon="' + Icon_0 + '" url="' + Url_0 + '" caption="' + Caption_0 + '"] ';
					shortcode += About_0;
					shortcode += ' [/bra_icon_box]';
					
					shortcode += ' [bra_icon_box icon="' + Icon_1 + '" url="' + Url_1 + '" caption="' + Caption_1 + '"] ';
					shortcode += About_1;
					shortcode += ' [/bra_icon_box]';
					
					shortcode += ' [bra_icon_box icon="' + Icon_2 + '" url="' + Url_2 + '" caption="' + Caption_2 + '"] ';
					shortcode += About_2;
					shortcode += ' [/bra_icon_box]';
					
					shortcode += ' [bra_icon_box icon="' + Icon_3 + '" url="' + Url_3 + '" caption="' + Caption_3 + '"] ';
					shortcode += About_3;
					shortcode += ' [/bra_icon_box]';

					shortcode += ' [/bra_icon_boxes_container]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	


/////////////////////
//   BOXED TEXT    //
/////////////////////
		var name3 = 'boxed_text';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_template.php?name=" + name3 + "&fields[]=Title&fields[]=Description&defaults[]=Hello.&defaults[]=We like to make things for web&types[]=text&types[]=textarea&descriptions[]=Insert title&descriptions[]=Insert description (2nd line)&submit=Insert boxed text", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name3 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    'Title'    : 'Hello.',
					'Description'  : 'We like to make things for web'
				    };
			    var shortcode = '[bra_' + name3;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name3 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});		

/////////////////////
//     DIVIDER     //
/////////////////////
		var name4 = 'divider';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_template.php?name=" + name4 + "&fields[]=Height&defaults[]=80&types[]=text&descriptions[]=Inset height of blank space&submit=Insert empty space", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button

		    form.find('#shortcodes_' + name4 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    Height    : '80'
				    };
			    var shortcode = '[bra_' + name4;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name4 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});
		
/////////////////////
//  BORDER DIVIDER //
/////////////////////
		var name5 = 'border_divider';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_template.php?name=" + name5 + "&fields[]=Top&fields[]=Bottom&defaults[]=40&defaults[]=40&types[]=text&types[]=text&descriptions[]=Insert height of empty space above the divider&descriptions[]=Insert height of empty space below the divider&submit=Insert Border Divider", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button

		    form.find('#shortcodes_' + name5 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    'Top'    : '40',
					'Bottom'  : '40'
				    };
			    var shortcode = '[bra_' + name5;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name5 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});
		

/////////////////////
//     BUTTONS     //
/////////////////////
		var name6 = 'buttons';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_buttons.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name6 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				


					var text = table.find('#shortcodes_' + name6 + '-text').val();
					var url = table.find('#shortcodes_' + name6 + '-url').val();
					var size = table.find('#shortcodes_' + name6 + '-size').val();
					var style = table.find('#shortcodes_' + name6 + '-style').val();
					var color = table.find('#shortcodes_' + name6 + '-color').val();


					shortcode = ' [bra_button text="' + text + '" url="' + url +  '" size="' + size + '" style="' + style  + '" color="' + color + '"]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
/////////////////////
//    HIGHLIGHTS   //
/////////////////////
		var name7 = 'highlights';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_highlights.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name7 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
					var text = table.find('#shortcodes_' + name7 + '-text').val();
					var style = table.find('#shortcodes_' + name7 + '-style').val();

					shortcode = ' [bra_highlight style="' + style  + '"]' + text + '[/bra_highlight]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
		
/////////////////////
//    BLOCKQUOTES  //
/////////////////////
		var name8 = 'blockquotes';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_blockquotes.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name8 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
					var text = table.find('#shortcodes_' + name8 + '-text').val();
					var align = table.find('#shortcodes_' + name8 + '-align').val();

					shortcode = ' [bra_blockquote align="' + align  + '"]' + text + '[/bra_blockquote]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
/////////////////////
//    TOGGLE       //
/////////////////////
		var name9 = 'toggle';
	
		jQuery.get("../wp-content/themes/zigzagwp/includes/shortcodes_toggle.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name9 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
					var text = table.find('#shortcodes_' + name9 + '-text').val();
					var caption = table.find('#shortcodes_' + name9 + '-caption').val();
					var collapsable = table.find('#shortcodes_' + name9 + '-collapsable').val();

					shortcode = ' [bra_toggle collapsable="' + collapsable + '" caption="' + caption  + '"]' + text + '[/bra_toggle]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
/////////////////////////////////////////////		
		
		
		

	});

})()

jQuery(window).load(function() {

})