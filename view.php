<?php  defined("C5_EXECUTE") or die("Access Denied."); ?>
<div class="swiper-slide">
<?php  if ($imageandlink) { ?>
  <?php
     if (trim($imageandlink_url) != "") {
         echo '<a href="' . $imageandlink_url . '" class="thumbnail" ';
     } ?>
 <?php  if (isset($atinternettracking) && trim($atinternettracking) != "") { ?>
 onclick="return ATTag.click.send({elem:this, <?php  echo h($atinternettracking); ?>});">
 <?php  } ?>
        <?php
$imageandlink_thumb = Core::make('helper/image')->getThumbnail($imageandlink, 200, 136, true);
                                $imageandlink_tag = new \HtmlObject\Image();
                                $imageandlink_tag->src($imageandlink_thumb->src)->width($imageandlink_thumb->width)->height($imageandlink_thumb->height);
$imageandlink_tag->alt($imageandlink->getTitle());
$imageandlink_tag->addClass('img-responsive');
echo $imageandlink_tag;
?><?php  } ?>
<?php  if (isset($offertext) && trim($offertext) != "") { ?>
    <span class="specialoffer-title"><?php  echo h($offertext); ?></span><?php  } ?>
</a></div>
