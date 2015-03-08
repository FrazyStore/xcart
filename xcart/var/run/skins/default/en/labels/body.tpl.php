<ul class="labels">
  <?php $name = isset($this->name) ? $this->name : null; $_foreach_var = $this->getLabels(); if (isset($_foreach_var)) { $this->nameArraySize=count($_foreach_var); $this->nameArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->key => $this->name){ $this->nameArrayPointer++; ?><li  class="label-<?php echo $this->get('key'); ?>">
    <?php $this->getWidget(array('template' => 'label/body.tpl', 'labelContent' => $this->get('name')))->display(); ?>
  </li>
<?php } $this->name = $name; ?>
</ul>
