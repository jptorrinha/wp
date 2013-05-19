<?php
/***************************/
/*  Brankic WP SHORT CODES  */
/***************************/


class Brankic_shortcodes
{
    function __construct() {
        add_action( 'admin_init', array( $this, 'action_admin_init' ) );
    }
    
    function action_admin_init() {
        // only hook up these filters if we're in the admin panel, and the current user has permission
        // to edit posts and pages
        if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
            add_filter( 'mce_buttons', array( $this, 'filter_mce_button' ) );
            add_filter( 'mce_external_plugins', array( $this, 'filter_mce_plugin' ) );
        }
    }
    
    function filter_mce_button( $buttons ) {
        // add a separation before our button, here our button's id is "brankic_shortcodes_button"
        array_push( $buttons, '|', 'brankic_shortcodes_button' );
        return $buttons;
    }
    
    function filter_mce_plugin( $plugins ) {
        // this plugin file will work the magic of our button
        $plugins['shortcodes_options'] = get_bloginfo('template_url').'/includes/shortcodes_options.js';
        return $plugins;
    }
}
$brankic_shortcodes = new Brankic_shortcodes();

function Bra_graph_container($atts, $content = null) {
/*******************************************************************************************************************
* GRAPH BARS CONTAINER                                                                                             *
*                                                                                                                  *
*******************************************************************************************************************/
    $rand = rand(0,10000);
    $html = '<ul id="services-graph-' . $rand . '" class="services-graph"> ' . no_wpautop($content) .'</ul>'; 
    $html .= '<script type="text/javascript">/***************************************************
                  SLIDING GRAPH
***************************************************/
jQuery(document).ready(function($){
                                
    function isScrolledIntoView(id)
    {
        var elem = "#" + id;
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
    
        if ($(elem).length > 0){
            var elemTop = $(elem).offset().top;
            var elemBottom = elemTop + $(elem).height();
        }

        return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom)
          && (elemBottom <= docViewBottom) &&  (elemTop >= docViewTop) );
    }

    
    
    function sliding_horizontal_graph(id, speed){
        //alert(id);
        $("#" + id + " li span").each(function(i){
            var j = i + 1;                                           
            var cur_li = $("#" + id + " li:nth-child(" + j + ") span");
            var w = cur_li.attr("title");
            cur_li.animate({width: w + "%"}, speed);
        })
    }
    
    function graph_init(id, speed){
        $(window).scroll(function(){
            if (isScrolledIntoView(id)){
                sliding_horizontal_graph(id, speed);
            }
            else{
                //$("#" + id + " li span").css("width", "0");
            }
        })
        
        if (isScrolledIntoView(id)){
            sliding_horizontal_graph(id, speed);
        }
    }
    
    graph_init("services-graph-' . $rand . '", 1000);
    

}); </script> ';      
    return $html;
}
add_shortcode('bra_graph_container', 'Bra_graph_container');

function Bra_graph($atts, $content = null) {
/*******************************************************************************************************************
* GRAPH BAR SHORTCODE (MUST BE INSIDE THE GRAPH CONTAINER)                                                         *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "Title", "percent" => 50), $atts));   
    $html = ' <li><span title="' . $percent . '"></span><p>' . $title . ' <strong>' . $percent .'%</strong></p></li>';
    return $html;
}
add_shortcode('bra_graph', 'Bra_graph');

function Bra_team_member($atts, $content = null) {
/*******************************************************************************************************************
* TEAM MEMBER                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("name" => "", "position" => "", "last" => "", "contact_icon_0" => "", "contact_icon_url_0" => "", 
    "contact_icon_1" => "", "contact_icon_url_1" => "", "contact_icon_2" => "", "contact_icon_url_2" => "", 
    "contact_icon_3" => "", "contact_icon_url_3" => ""), $atts));
    
    $member_image = "";
    $member_images = bra_get_images($content);
    if (count($member_images) > 0) $member_image = $member_images[0];
    $text = bra_remove_images($content, false);
    if ($last == "yes") $class = "last"; else $class = ""; 
    
     $html =  "<div class='one-third team $class'>\n";
     if ($member_image != "") $html .=  " <img src='" . $member_image . "' alt='' />\n";
     $html .=  "   <div class='team-member'>\n";                        
     $html .=  "       <div class='team-member-info'>\n";
     $html .=  "           <ul>\n";
     $html .=  "               <li><h2>" . $name . "</h2></li>\n";
     $html .=  "               <li><h3>" . $position . "</h3></li>\n";        
     $html .=  "           </ul>\n";        
     $html .=  "           <ul class='contact'>\n";        
     if ($contact_icon_0 != "") $html .=  "               <li><a href='" . $contact_icon_url_0 . "'><img class='check_path' src='" . $contact_icon_0 . "' alt='#' /></a></li>\n";    
     if ($contact_icon_1 != "") $html .=  "               <li><a href='" . $contact_icon_url_1 . "'><img class='check_path' src='" . $contact_icon_1 . "' alt='#' /></a></li>\n";
     if ($contact_icon_2 != "") $html .=  "               <li><a href='" . $contact_icon_url_2 . "'><img class='check_path' src='" . $contact_icon_2 . "' alt='#' /></a></li>\n";
     if ($contact_icon_3 != "") $html .=  "               <li><a href='" . $contact_icon_url_3 . "'><img class='check_path' src='" . $contact_icon_3 . "' alt='#' /></a></li>\n";
     $html .=  "           </ul>\n";
     $html .=  "       </div><!--END TEAM-MEMBER-INFO-->\n";
     $html .=  "       <p>" . no_wpautop($text) ."</p>\n";
     $html .=  " </div><!--END TEAM-MEMBER--> \n";
     $html .=  "</div><!--END ONE-THIRD-->\n";

    return $html;
}
add_shortcode('bra_team_member', 'Bra_team_member');

function Bra_icon_boxes_container($atts, $content = null) {
/*******************************************************************************************************************
* ICON BOXES CONTAINER                                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    $html =  "\n<ul class='icon-box'>\n" . no_wpautop($content) ."\n</ul>\n";
    return $html;
}
add_shortcode('bra_icon_boxes_container', 'Bra_icon_boxes_container');


function Bra_icon_box($atts, $content = null) {
/*******************************************************************************************************************
* ICON BOX                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("icon" => "", "caption" => "", "url" => ""), $atts));
    
    $text = bra_remove_images($content, false);
    
     $html =  "<li>\n";
     if ($icon != "") $html .=  "<div class='icon'><a href='$url'><img class='check_path' src='$icon' alt='' /></a></div> \n";
     $html .=  "   <h2>$caption</h2>\n";                        
     $html .=  "       <span class='desc'>" . no_wpautop($text) ."</span>\n";
     $html .=  "</li>\n";

    return $html;
}
add_shortcode('bra_icon_box', 'Bra_icon_box');

function Bra_boxed_text($atts, $content = null) {
/*******************************************************************************************************************
* BOXED TEXT                                                                                                    *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "", "description" => ""), $atts));
     $html =  "<div class='section-title home'>\n";
     $html .=  "   <h2 class='title'>$title</h2>\n";                        
     $html .=  "   <p>$description</p>\n";
     $html .=  " </div><!--END SECTION TITLE-->\n";

    return $html;
}
add_shortcode('bra_boxed_text', 'Bra_boxed_text');

function Bra_divider($atts, $content = null) {
/*******************************************************************************************************************
* DIVIDER WITH NOTHING - ONLY EMPTY SPACE                                                                          *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("height" => '80'), $atts));
   return "<div class='divider' style='height: $height" . "px;'></div>\n<div class='clear'></div>";
}
add_shortcode('bra_divider', 'Bra_divider');

function Bra_border_divider($atts, $content = null) {
/*******************************************************************************************************************
* BORDER DIVIDER WITH NOTHING                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("top" => "40", "bottom" => "40"), $atts));
   return "<div class='divider-border' style='margin-top: $top" . "px; margin-bottom: $bottom" . "px'></div>\n<div class='clear'></div>";
}
add_shortcode('bra_border_divider', 'Bra_border_divider');

function Bra_button($atts, $content = null) {
/*******************************************************************************************************************
* BUTTONS                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("text" => "Button", "url" => "http://www.brankic1979.com", "size" => "small", "style" => "", "color" => "grey"), $atts));
   return "<a href='$url' class='button $size $style $color'>$text</a>";
}
add_shortcode('bra_button', 'Bra_button');

function Bra_highlight($atts, $content = null) {
/*******************************************************************************************************************
* HIGHLIGHTS                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("style" => ""), $atts));
   return "<span class='$style'>" .no_wpautop($content). "</span>";
}
add_shortcode('bra_highlight', 'Bra_highlight');


function Bra_blockquote($atts, $content = null) {
/*******************************************************************************************************************
* BLOCKQUOTES                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("align" => "left"), $atts));
   return "<blockquote class='$align'>" .no_wpautop($content). "</blockquote>";
}
add_shortcode('bra_blockquote', 'Bra_blockquote');

function Bra_toggle($atts, $content = null) {
/*******************************************************************************************************************
* TOGGLE                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("caption" => "Toggle", "collapsable" => "yes"), $atts));
     if ($collapsable == "yes")
     {
         $html =  '<div class="trigger-button"><span>' . $caption . '</span></div> <div class="accordion">';
         $html .= no_wpautop($content);                                                             
         $html .= '</div><!--END ACCORDION-->';
     }
     else
     {
         $html = '<div class="toggle-wrap">';    
         $html .=  '<span class="trigger"><a href="#">' . $caption . '</a></span><div class="toggle-container">';
         $html .= no_wpautop($content);                                                             
         $html .= '</div><!--END TOGGLE-WRAP--></div><!--END TOGGLE-CONTAINER-->';
     }
   return $html;
}
add_shortcode('bra_toggle', 'Bra_toggle');


/*******************************************************************************************************************
* COLUMNS SHORTCODES                                                                                               *
*                                                                                                                  *
*******************************************************************************************************************/
function One( $atts, $content = null ) {
   return '<div class="one">' . no_wpautop($content) . '</div>';
}
add_shortcode('one', 'One'); 

function One_third( $atts, $content = null ) {
   return '<div class="one-third">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_third', 'One_third');

function One_third_last( $atts, $content = null ) {
   return '<div class="one-third last">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_third_last', 'One_third_last');

function Two_thirds( $atts, $content = null ) {
   return '<div class="two-third">' . no_wpautop($content) . '</div>';
}
add_shortcode('two_thirds', 'Two_thirds');

function Two_thirds_last( $atts, $content = null ) {
   return '<div class="two-third last">' . no_wpautop($content) . '</div>';
}
add_shortcode('two_thirds_last', 'Two_thirds_last');

function One_half( $atts, $content = null ) {
   return '<div class="one-half">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_half', 'One_half');

function One_half_last( $atts, $content = null ) {
   return '<div class="one-half last">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_half_last', 'One_half_last');

function One_fourth( $atts, $content = null ) {
   return '<div class="one-fourth">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_fourth', 'One_fourth');

function One_fourth_last( $atts, $content = null ) {
   return '<div class="one-fourth last">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_fourth_last', 'One_fourth_last');





?>