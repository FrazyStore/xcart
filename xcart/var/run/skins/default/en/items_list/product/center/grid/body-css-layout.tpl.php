<?php $this->displayViewListContent('itemsList.product.cart'); ?>

<div class="products">

  <?php if ($this->getPageData()): ?><ul class="products-grid grid-list" >
    <?php $product = isset($this->product) ? $this->product : null; $_foreach_var = $this->getPageData(); if (isset($_foreach_var)) { $this->productArraySize=count($_foreach_var); $this->productArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->product){ $this->productArrayPointer++; ?><li  class="product-cell box-product">
      <?php $this->displayInheritedViewListContent('head', array('product' => $this->get('product'))); ?>
      <div class="<?php echo func_htmlspecialchars($this->getProductCellClass($this->get('product'))); ?>">
        <?php $this->displayInheritedViewListContent('info', array('product' => $this->get('product'))); ?>
      </div>
      <?php $this->displayInheritedViewListContent('tail', array('product' => $this->get('product'))); ?>
    </li>
<?php } $this->product = $product; ?>
    <?php $item = isset($this->item) ? $this->item : null; $_foreach_var = $this->getNestedViewList('items'); if (isset($_foreach_var)) { $this->itemArraySize=count($_foreach_var); $this->itemArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->item){ $this->itemArrayPointer++; ?><li  class="product-cell box-product"><?php echo func_htmlspecialchars($this->get('item')->display()); ?></li>
<?php } $this->item = $item; ?>
  </ul><?php endif; ?>

</div>
