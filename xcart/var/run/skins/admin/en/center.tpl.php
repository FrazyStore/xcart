<?php $this->display('noscript.tpl'); ?>

<?php if ($this->isTitleVisible()&&$this->getTitle()): ?><h1 class="title" id="page-title" ><?php echo func_htmlspecialchars($this->t($this->getTitle())); ?></h1><?php endif; ?>

<?php $this->displayViewListContent('admin.center'); ?>

<?php if ($this->isDisplayRequired(array('access_denied'))):
  $this->display('access_denied.tpl');
endif; ?>




<?php if ($this->isDisplayRequired(array('product_list'))):
  $this->display('product/product_list_form.tpl');
endif; ?>

<?php if ($this->isDisplayRequired(array('profile')) && ($this->get('mode')=='delete')):
  $this->getWidget(array('template' => 'common/dialog.tpl', 'head' => 'Delete profile - Confirmation', 'body' => 'profile/confirm_delete.tpl'))->display();
endif; ?>
