<?php $_foreach_var = $this->getMetaResources(); if (isset($_foreach_var)) { $this->metaArraySize=count($_foreach_var); $this->metaArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->meta){ $this->metaArrayPointer++; ?>
  <?php echo $this->get('meta'); ?>
<?php }?>
