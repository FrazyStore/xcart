<div class="product-price <?php echo func_htmlspecialchars($this->getFingerprint()); ?>">
<?php $this->displayViewListContent('product.plain_price.head'); ?>
  <ul class="product-price">
  <?php $this->displayViewListContent('product.plain_price'); ?>
  </ul>
<?php $this->displayViewListContent('product.plain_price.tail'); ?>
</div>
