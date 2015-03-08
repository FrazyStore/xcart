<div class="form-item">
  <label for="subject">
    <?php echo func_htmlspecialchars($this->t('Subject')); ?>
    <span class="form-required" title="<?php echo func_htmlspecialchars($this->t('This field is required.')); ?>">*</span>
  </label>
  <?php $this->getWidget(array('fieldName' => 'subject', 'placeholder' => $this->t('Subject'), 'value' => $this->getValue('subject'), 'fieldOnly' => 'true', 'required' => 'true'), 'XLite\View\FormField\Input\Text')->display(); ?>
</div>
