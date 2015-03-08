<div class="contact-us-description"><?php echo $this->t('To contact us please fill the form below'); ?></div>

<hr class="contact-us-description-hr" size="1" />

<?php $this->getWidget(array(), '\XLite\Module\CDev\ContactUs\View\Form\ContactUs', 'contact-us')->display(); ?>

<div id="contact-site-form">
  <?php $this->displayViewListContent('contact-us.send.fields'); ?>
</div>

<?php $this->getWidget(array('end' => '1'), null, 'contact-us')->display(); ?>
