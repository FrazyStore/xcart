<head<?php $_foreach_var = $this->getHeadAttributes(); if (isset($_foreach_var)) { $this->vArraySize=count($_foreach_var); $this->vArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->k => $this->v){ $this->vArrayPointer++; ?> <?php echo func_htmlspecialchars($this->get('k')); ?>="<?php echo func_htmlspecialchars($this->get('v')); ?>"<?php }?>>
  <?php $this->displayViewListContent('head'); ?>
</head>
