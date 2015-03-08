<ul class="breadcrumb">
  <?php $_foreach_var = $this->getNodes(); if (isset($_foreach_var)) { $this->nodeArraySize=count($_foreach_var); $this->nodeArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->index => $this->node){ $this->nodeArrayPointer++; ?>
    <?php echo func_htmlspecialchars($this->get('node')->display()); ?>
  <?php }?>
</ul>
