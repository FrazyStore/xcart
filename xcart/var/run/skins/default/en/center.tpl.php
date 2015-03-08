<?php $this->displayViewListContent('center.top'); ?>

<?php if ($this->isTitleVisible()&&$this->getTitle()): ?><h1 class="title" id="page-title" ><?php echo func_htmlspecialchars($this->t($this->getMainTitle())); ?></h1><?php endif; ?>

<?php $this->display('center_top.tpl'); ?>

<?php $this->displayViewListContent('center.bottom'); ?>
