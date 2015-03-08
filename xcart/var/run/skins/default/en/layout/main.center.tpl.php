<div id="main-wrapper">
  <?php if ($this->isForceChangePassword()){?>
  <div id="main" class="force-change-password-section clearfix">
    <?php $this->getWidget(array(), '\XLite\View\Model\Profile\ForceChangePassword')->display(); ?>
  </div>
  <?php }else{ ?>
  <div id="main" class="clearfix">
    <?php $this->displayViewListContent('layout.main.center'); ?>
  </div>
  <?php }?>
</div>
