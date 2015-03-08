<li <?php echo $this->printTagAttributes($this->getListContainerAttributes()); ?>>

  <?php if ($this->getLink()){?>
    <a href="<?php echo func_htmlspecialchars($this->getLink()); ?>" class="location-title"><span><?php echo func_htmlspecialchars($this->t($this->getName())); ?></span></a>
  <?php }else{ ?>
    <span class="location-text"><?php echo func_htmlspecialchars($this->t($this->getName())); ?></span>
  <?php }?>

  <?php if ($this->getSubnodes()): ?><ul class="location-subnodes" >
    <?php $node = isset($this->node) ? $this->node : null; $_foreach_var = $this->getSubnodes(); if (isset($_foreach_var)) { $this->nodeArraySize=count($_foreach_var); $this->nodeArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->node){ $this->nodeArrayPointer++; ?><li >
      <?php if (!($this->get('node')->getName()==$this->getName())): ?><a href="<?php echo func_htmlspecialchars($this->get('node')->getLink()); ?>" ><?php echo func_htmlspecialchars($this->t($this->get('node')->getName())); ?></a><?php endif; ?>
      <?php if ($this->get('node')->getName()==$this->getName()): ?><a href="<?php echo func_htmlspecialchars($this->get('node')->getLink()); ?>"  class="current"><?php echo func_htmlspecialchars($this->t($this->get('node')->getName())); ?></a><?php endif; ?>
    </li>
<?php } $this->node = $node; ?>
  </ul><?php endif; ?>

</li>
