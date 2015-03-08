<div id="secondary-menu" class="clearfix">
<?php $_foreach_var = $this->getItems(); if (isset($_foreach_var)) { $this->itemArraySize=count($_foreach_var); $this->itemArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->i => $this->item){ $this->itemArrayPointer++; ?>
  <span <?php echo $this->displayItemClass($this->get('i'),$this->get('item')); ?>><a href="<?php echo func_htmlspecialchars($this->getComplex('item.url')); ?>" <?php if ($this->getComplex('item.active')){?>class="active"<?php }?>><?php echo func_htmlspecialchars($this->getComplex('item.label')); ?></a></span>
<?php }?>
</div>
