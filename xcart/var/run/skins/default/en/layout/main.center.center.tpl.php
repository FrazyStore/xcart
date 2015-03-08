<div id="content" class="column">
  <?php if ($this->isDisplayRequired(array('trial_notice','main','checkout')) && ($this->isTrialNoticeAutoDisplay())):
  $this->getWidget(array(), '\XLite\View\ModulesManager\TrialNotice')->display();
endif; ?>
  <div class="section">
    <a id="main-content"></a>
    <?php $this->display('center.tpl'); ?>
  </div>
</div>
