<ul>
  
<li>
  <?php $author = '1';?>
  <?php echo get_avatar($author,50);?>
  <span><?php $user_info = get_userdata($author);
  echo($user_info->first_name .  " " . $user_info->last_name . "\n");
  ?></span>
  <a href="<?php bloginfo('url');?>/?author=<?php echo $author;?>">/blog do autor</a>
</li>

<li>
  <?php $author = '3';?>
  <?php echo get_avatar($author,50);?>
  <span><?php $user_info = get_userdata($author);
  echo($user_info->first_name .  " " . $user_info->last_name . "\n");
  ?></span>
  <a href="<?php bloginfo('url');?>/?author=<?php echo $author;?>">/blog do autor</a>
</li>

<li>
  <?php $author = '2';?>
  <?php echo get_avatar($author,50);?>
  <span><?php $user_info = get_userdata($author);
  echo($user_info->first_name .  " " . $user_info->last_name . "\n");
  ?></span>
  <a href="<?php bloginfo('url');?>/?author=<?php echo $author;?>">/blog do autor</a>
</li>
                  
</ul>