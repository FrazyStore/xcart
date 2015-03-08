<div class="form-item">
  <label for="name">
    <?php echo func_htmlspecialchars($this->t('Your name')); ?>
    <span class="form-required" title="<?php echo func_htmlspecialchars($this->t('This field is required.')); ?>">*</span>
  </label>
  <?php $this->getWidget(array('placeholder' => $this->t('Full Name'), 'fieldName' => 'name', 'value' => $this->getValue('name'), 'fieldOnly' => 'true', 'required' => 'true'), 'XLite\View\FormField\Input\Text')->display(); ?>
</div>
