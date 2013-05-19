
<?php
$root = "../wp-content/themes/zigzagwp";  
$name = "toggle";
$submit = "Insert toggle element";
?>

<div id="shortcodes_<?php echo $name; ?>-form">

<table id="shortcodes_<?php echo $name; ?>-table" class="form-table">

    <tr><?php $field_ = "Caption"; $field = "caption"; $default = "Developer"; $description = "Second line below the image"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field_; ?>" value="<?php echo $default; ?>" /><br />
        <small><?php echo $description; ?></small></td>
    </tr>
    
    <tr><?php $field_ = "Text"; $field = "text"; $default = "Dummy text"; $description = "Text to be highlighted"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><textarea style="width:400px" name="<?php echo $field; ?>" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $default; ?></textarea>
        <br />
        <small><?php echo $description; ?></small></td>
    </tr>
    
    <tr><?php $field_ = "Collapsable"; $field = "collapsable"; $description = "Should it be collapsable"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
          <option value="yes">Yes</option>
          <option value="no">No</option> 
          </select>
          <br />
            <small><?php echo $description; ?></small>
        </td>
    </tr>
            
	</table>
<p class="submit">
	<input type="button" id="shortcodes_<?php echo $name; ?>-submit" class="button-primary" value="<?php echo $submit; ?>" name="submit" />
</p>
</div>