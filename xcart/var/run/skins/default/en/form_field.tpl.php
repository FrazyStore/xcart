<?php if (!($this->getParam('fieldOnly'))){?>
  <div class="<?php echo func_htmlspecialchars($this->getLabelContainerClass()); ?>">
    <label for="<?php echo func_htmlspecialchars($this->getFieldId()); ?>"><?php echo func_htmlspecialchars($this->getFormattedLabel()); ?></label>
  </div>
  <div class="star">
    <?php if ($this->getParam('required')){?>*<?php }else{ ?>&nbsp;<?php }?>
  </div>
<?php }?>

<div class="<?php echo func_htmlspecialchars($this->getValueContainerClass()); ?>">
  <?php $this->display($this->getDir().'/'.$this->getFieldTemplate()); ?>
  <?php if ($this->getParam('help')):
  $this->getWidget(array('text' => $this->getParam('help'), 'isImageTag' => 'true', 'className' => 'help-icon'), '\XLite\View\Tooltip')->display();
endif; ?>
  <?php if ($this->getParam('comment')): ?><div  class="form-field-comment <?php echo func_htmlspecialchars($this->getFieldId()); ?>-comment"><?php echo str_replace('"', '&quot;',$this->t($this->getParam('comment'))); ?></div><?php endif; ?>
  <?php if ($this->getFormFieldJSData()){?><?php echo func_htmlspecialchars($this->displayCommentedData($this->getFormFieldJSData())); ?><?php }?>
  <?php if ($this->getInlineJSCode()): ?><script  type="text/javascript"><?php echo str_replace('"', '&quot;',$this->getInlineJSCode()); ?></script><?php endif; ?>
</div>

<?php if (!($this->getParam('fieldOnly'))){?>
  <div class="clear"></div>
<?php }?>
