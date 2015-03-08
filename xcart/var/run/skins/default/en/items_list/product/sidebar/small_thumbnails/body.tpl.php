<?php $this->displayViewListContent('itemsList.product.cart'); ?>

<ul class="list-body-sidebar products products-sidebar products-sidebar-small-thumbnails">

  <?php $product = isset($this->product) ? $this->product : null; $_foreach_var = $this->getSideBarData(); if (isset($_foreach_var)) { $this->productArraySize=count($_foreach_var); $this->productArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->i => $this->product){ $this->productArrayPointer++; ?><li  class="product-cell box-product item <?php echo func_htmlspecialchars($this->getAdditionalItemClass($this->get('productArrayPointer'),$this->get('productArraySize'))); ?>">
    <div class="<?php echo func_htmlspecialchars($this->getProductCellClass($this->get('product'))); ?>">
      <?php $this->displayInheritedViewListContent('info', array('product' => $this->get('product'))); ?>
      <div class="clear"></div>
    </div>
  </li>
<?php } $this->product = $product; ?>

  <?php if ($this->isShowMoreLink()): ?><li class="more_link" >
    <a class="link" href="<?php echo func_htmlspecialchars($this->getMoreLinkURL()); ?>"><?php echo func_htmlspecialchars($this->getMoreLinkText()); ?></a>
  </li><?php endif; ?>

</ul>
