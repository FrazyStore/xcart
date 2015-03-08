<?php if ($this->participateSale()): ?><div  class="sale-label-product-details">
  <div class="text">
    <?php $this->displayNestedViewListContent('sale_price.text'); ?>
  </div>
  <?php $this->displayNestedViewListContent('sale_price.label'); ?>
</div><?php endif; ?>
