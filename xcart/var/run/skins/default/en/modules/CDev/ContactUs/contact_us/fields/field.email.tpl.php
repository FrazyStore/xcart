<div class="form-item">
  <label for="email">
    <?php echo func_htmlspecialchars($this->t('Your e-mail')); ?>
    <span class="form-required" title="<?php echo func_htmlspecialchars($this->t('This field is required.')); ?>">*</span>
  </label>
  <?php $this->getWidget(array('placeholder' => $this->t('Email Address'), 'fieldName' => 'email', 'value' => $this->getValue('email'), 'fieldOnly' => 'true', 'required' => 'true'), 'XLite\View\FormField\Input\Text\Email')->display(); ?>
</div>
