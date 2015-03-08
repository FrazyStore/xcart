<div class="navbar navbar-inverse mobile-hidden" role="navigation">
  <div class="collapse navbar-collapse">
    <?php if ($this->hasItems()): ?><ul  class="nav navbar-nav">
      <?php $_foreach_var = $this->getItems(); if (isset($_foreach_var)) { $this->itemArraySize=count($_foreach_var); $this->itemArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->i => $this->item){ $this->itemArrayPointer++; ?>
      <li <?php echo $this->displayItemClass($this->get('i'),$this->get('item')); ?>><a href="<?php echo func_htmlspecialchars($this->getComplex('item.url')); ?>" <?php if ($this->getComplex('item.active')){?>class="active"<?php }?>><?php echo func_htmlspecialchars($this->getComplex('item.label')); ?></a></li>
      <?php }?>
    </ul><?php endif; ?>
  </div>
</div>

<?php if ($this->hasItems()): ?><ul  class="desktop-hidden">
  <?php $_foreach_var = $this->getItems(); if (isset($_foreach_var)) { $this->itemArraySize=count($_foreach_var); $this->itemArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->i => $this->item){ $this->itemArrayPointer++; ?>
  <li <?php echo $this->displayItemClass($this->get('i'),$this->get('item')); ?>><a href="<?php echo func_htmlspecialchars($this->getComplex('item.url')); ?>" <?php if ($this->getComplex('item.active')){?>class="active"<?php }?>><?php echo func_htmlspecialchars($this->getComplex('item.label')); ?></a></li>
  <?php }?>
</ul><?php endif; ?>
