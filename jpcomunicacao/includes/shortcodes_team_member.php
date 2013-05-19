
<?php
$root = "../wp-content/themes/zigzagwp";
$root_ = "wp-content/themes/zigzagwp";
$name = "team_member";
$submit = "Insert new team member";
?>

<div id="shortcodes_<?php echo $name; ?>-form">
<script language="JavaScript" type="text/javascript">
jQuery(document).ready(function($){  
	
	field_id = "#shortcodes_team_member-Contact_Icon_0";
	value = "../" + $(field_id).attr('value'); 

	$("#td_icon_0 img").attr("src", value);
	$(field_id).change(function()
	{
	   value = "../" + $(this).attr('value');
	   $("#td_icon_0 img").attr("src", value);
		
	});
    
    field_id = "#shortcodes_team_member-Contact_Icon_1";
    value = "../" + $(field_id).attr('value'); 

    $("#td_icon_1 img").attr("src", value);
    $(field_id).change(function()
    {
       value = "../" + $(this).attr('value');
       $("#td_icon_1 img").attr("src", value);
        
    });
    
    field_id = "#shortcodes_team_member-Contact_Icon_2";
    value = "../" + $(field_id).attr('value'); 

    $("#td_icon_2 img").attr("src", value);
    $(field_id).change(function()
    {
       value = "../" + $(this).attr('value');
       $("#td_icon_2 img").attr("src", value);
        
    });
    
    field_id = "#shortcodes_team_member-Contact_Icon_3";
    value = "../" + $(field_id).attr('value'); 

    $("#td_icon_3 img").attr("src", value);
    $(field_id).change(function()
    {
       value = "../" + $(this).attr('value');
       $("#td_icon_3 img").attr("src", value);
        
    });
	
	for (i = 1 ; i < 4 ; i++){
		$(".contact_icon_wrapper_" + i).hide();
	}
	
	$(".contact_icon_wrapper_0 div a").click(function(){
		$(".contact_icon_wrapper_1").show();
		$(this).hide();
	});
	
	$(".contact_icon_wrapper_1 div a").click(function(){
		$(".contact_icon_wrapper_2").show();
		$(this).hide();
	});
	
	$(".contact_icon_wrapper_2 div a").click(function(){
		$(".contact_icon_wrapper_3").show();
		$(this).hide();
	});
		
		
		//if ($("#shortcodes_team_member-Contact_Icon_" + i).attr("value") != ""){
			//$(".contact_icon_wrapper_" + i).show();
		//}
	
	
	
});
</script>
<img src="<?php echo $root; ?>/includes/team_member.jpg" width="200" class="demo_image"/>
<table id="shortcodes_<?php echo $name; ?>-table" class="form-table">

    <tr><?php $field = "Name"; $default = "John Doe"; $description = "First line below the image"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br />
        <small><?php echo $description; ?></small>
		</td>
    </tr>
    
    <tr><?php $field = "Position"; $default = "Developer"; $description = "Second line below the image"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br />
        <small><?php echo $description; ?></small></td>
    </tr>
    
    <tr class="contact_icon_wrapper_0"><?php $field_ = "Contact Icon 1"; $field = "Contact_Icon_0"; $default = ""; $description = "Small icon"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
          <option value=""></option>
          <?php
          $icons_urls = glob("../images/socialize/*.*");
          foreach ($icons_urls as $icon_url)
          {
              $icon_url = $root_.substr($icon_url, 2);
              $icon_url_ = substr($icon_url, strpos($icon_url, "/socialize/") + 11);
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url_; ?></option>
          <?php
          }
          ?>
          </select>
<div id="td_icon_0"><img src="" /></div>
          <br />
      <small><?php echo $description; ?></small></td>
    </tr>
    
    <tr class="contact_icon_wrapper_0"><?php $field_ = "Contact Icon URL 1"; $field = "Contact_Icon_URL_0"; $default = "mailto:email@email.com"; $description = "URL of Icon"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input style="width:400px" type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br />
        <small><?php echo $description; ?></small>
        <div><a href="#">Add new</a></div>
        </td>
        
    </tr>
    
    
    
    <tr class="contact_icon_wrapper_1"><?php $field_ = "Contact Icon 2"; $field = "Contact_Icon_1"; $default = ""; $description = "Small icon"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
		  <option value=""></option>
          <?php
          $icons_urls = glob("../images/socialize/*.*");
          foreach ($icons_urls as $icon_url)
          {
              $icon_url = $root_.substr($icon_url, 2);
              $icon_url_ = substr($icon_url, strpos($icon_url, "/socialize/") + 11);
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url_; ?></option>
          <?php
          }
          ?>
          </select>
<div id="td_icon_1"><img src="" /></div>
          <br />
      <small><?php echo $description; ?></small></td>
      
    </tr>
    
    <tr class="contact_icon_wrapper_1"><?php $field_ = "Contact Icon URL 2"; $field = "Contact_Icon_URL_1"; $default = ""; $description = "URL of Icon"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input style="width:400px" type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br />
        <small><?php echo $description; ?></small>
        <div><a href="#">Add new</a></div>
        </td>
        
    </tr>
    
    <tr class="contact_icon_wrapper_2"><?php $field_ = "Contact Icon 3"; $field = "Contact_Icon_2"; $default = ""; $description = "Small icon"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
		  <option value=""></option>
          <?php
          $icons_urls = glob("../images/socialize/*.*");
          foreach ($icons_urls as $icon_url)
          {
              $icon_url = $root_.substr($icon_url, 2);
              $icon_url_ = substr($icon_url, strpos($icon_url, "/socialize/") + 11);
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url_; ?></option>
          <?php
          }
          ?>
          </select>
<div id="td_icon_2"><img src="" /></div>
          <br />
          <small><?php echo $description; ?></small>
      </td>
    </tr>
    
    <tr class="contact_icon_wrapper_2"><?php $field_ = "Contact Icon URL 3"; $field = "Contact_Icon_URL_2"; $default = ""; $description = "URL of Icon"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input style="width:400px" type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br /> <br>
        <small><?php echo $description; ?></small>
        <div><a href="#">Add new</a></div>
        </td>
         
    </tr>
    
    
    <tr class="contact_icon_wrapper_3"><?php $field_ = "Contact Icon 4"; $field = "Contact_Icon_3"; $default = ""; $description = "Small icon"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
		  <option value=""></option>
          <?php
          $icons_urls = glob("../images/socialize/*.*");
          foreach ($icons_urls as $icon_url)
          {
              $icon_url = $root_.substr($icon_url, 2);
              $icon_url_ = substr($icon_url, strpos($icon_url, "/socialize/") + 11);
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url_; ?></option>
          <?php
          }
          ?>
          </select>
<div id="td_icon_3"><img src="" /></div>
          <br />
      <small><?php echo $description; ?></small></td>
    </tr>
    
    <tr class="contact_icon_wrapper_3"><?php $field_ = "Contact Icon URL 4"; $field = "Contact_Icon_URL_3"; $default = ""; $description = "URL of Icon"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input style="width:400px" type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br><br>
        <small><?php echo $description; ?></small>
        </td>
         
    </tr>
    
    <tr><?php $field = "About"; $default = "Lorem ipsum dolor set amet"; $description = "Block of text"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field; ?></label></th>
        <td><textarea style="width:400px" name="<?php echo $field; ?>" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $default; ?></textarea>
        <br />
        <small><?php echo $description; ?></small></td>
    </tr>
    
    <tr><?php $field_ = "Is it last?"; $field = "Last"; $description = "Is it last item in the row?"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
          <br />
      <small><?php echo $description; ?></small></td>
    </tr>
                      
	</table>
<p class="submit">
	<input type="button" id="shortcodes_<?php echo $name; ?>-submit" class="button-primary" value="<?php echo $submit; ?>" name="submit" />
</p>
</div>