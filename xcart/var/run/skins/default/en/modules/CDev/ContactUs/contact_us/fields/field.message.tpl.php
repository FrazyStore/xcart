<div class="form-item">
  <label for="message" class="for-message">
    <?php echo func_htmlspecialchars($this->t('Message')); ?>
    <span class="form-required" title="<?php echo func_htmlspecialchars($this->t('This field is required.')); ?>">*</span>
  </label>
  <div class="resizable-textarea">
    <?php $this->getWidget(array('placeholder' => $this->t('Your Message'), 'fieldName' => 'message', 'value' => $this->getValue('message'), 'fieldOnly' => 'true', 'required' => 'true'), 'XLite\View\FormField\Textarea\Simple')->display(); ?>
  </div>
</div>
