<?php  defined("C5_EXECUTE") or die("Access Denied."); ?>

<div class="form-group">
    <?php
    if (isset($imageandlink) && $imageandlink > 0) {
        $imageandlink_o = File::getByID($imageandlink);
        if (!is_object($imageandlink_o)) {
            unset($imageandlink_o);
        }
    } ?>
    <?php  echo $form->label('imageandlink', t("Image and offer link") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Thumbnail Image and offer link") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('imageandlink', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo Core::make("helper/concrete/asset_library")->image('ccm-b-specialofferslider-imageandlink-' . Core::make('helper/validation/identifier')->getString(18), $view->field('imageandlink'), t("Choose Image"), $imageandlink_o); ?>
</div>
<div class="form-group">
    <?php  echo $form->label('imageandlink_url', t("Image and offer link") . " " . t("url")); ?>
    <?php  echo '<small class="required">' . t('Required') . '</small>'; ?>
    <?php  echo $form->text($view->field('imageandlink_url'), $imageandlink_url, array (
  'maxlength' => 255,
)); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('offertext', t("Offer Text") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Offer Text keep it short") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('offertext', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->text($view->field('offertext'), $offertext, array (
  'maxlength' => 30,
)); ?>
</div>
