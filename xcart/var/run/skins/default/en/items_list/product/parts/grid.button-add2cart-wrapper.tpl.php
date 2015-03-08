<?php if ($this->isDisplayAdd2CartButton()): ?><div  class="add-to-cart-button">
  <?php $this->getWidget(array('template' => 'items_list/product/parts/common.button-add2cart.tpl', 'product' => $this->get('product')))->display(); ?>
</div><?php endif; ?>
