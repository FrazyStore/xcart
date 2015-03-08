<div <?php echo $this->printTagAttributes($this->getItemsContainerAttributes()); ?>>

  <p class="title">
    <a href="<?php echo func_htmlspecialchars($this->buildURL('cart')); ?>"><?php echo func_htmlspecialchars($this->t('X items in bag',array('count'=>$this->get('cart')->countQuantity()))); ?></a>
  </p>

  <?php if ($this->hasItems()): ?><ul >
    <?php $item = isset($this->item) ? $this->item : null; $_foreach_var = $this->getItemsList(); if (isset($_foreach_var)) { $this->itemArraySize=count($_foreach_var); $this->itemArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->item){ $this->itemArrayPointer++; ?><li >
      <?php $this->displayViewListContent('minicart.horizontal.item', array('item' => $this->get('item'))); ?>
    </li>
<?php } $this->item = $item; ?>
  </ul><?php endif; ?>

  <?php if ($this->isTruncated()): ?><p  class="other-items"><a href="<?php echo func_htmlspecialchars($this->buildURL('cart')); ?>"><?php echo func_htmlspecialchars($this->t('Other items')); ?></a></p><?php endif; ?>

  <p class="subtotal">
    <strong><?php echo func_htmlspecialchars($this->t('Subtotal')); ?>:</strong>
    <span><?php echo func_htmlspecialchars($this->formatPrice($this->get('cart')->getSubtotal(),$this->get('cart')->getCurrency(),1)); ?></span>
  </p>

  <hr />

  <div class="buttons-row">
    <?php $this->displayViewListContent('minicart.horizontal.buttons'); ?>
  </div>

</div>
