<?php if ($this->isDisplayModeSelectorVisible()): ?><ul class="display-modes grid-list" >
  <?php $name = isset($this->name) ? $this->name : null; $_foreach_var = $this->get('displayModes'); if (isset($_foreach_var)) { $this->nameArraySize=count($_foreach_var); $this->nameArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->key => $this->name){ $this->nameArrayPointer++; ?><li  class="<?php echo func_htmlspecialchars($this->getDisplayModeLinkClassName($this->get('key'))); ?>">
    <a href="<?php echo func_htmlspecialchars($this->getActionURL(array('displayMode'=>$this->get('key')))); ?>" class="<?php echo func_htmlspecialchars($this->get('key')); ?>" title="<?php echo func_htmlspecialchars($this->t($this->get('name'))); ?>">
      <i class="fa <?php echo func_htmlspecialchars($this->getDisplayModeCSS($this->get('key'))); ?>"></i>
      <span class="text"><?php echo func_htmlspecialchars($this->t($this->get('name'))); ?></span>
    </a>
  </li>
<?php } $this->name = $name; ?>
</ul><?php endif; ?>
