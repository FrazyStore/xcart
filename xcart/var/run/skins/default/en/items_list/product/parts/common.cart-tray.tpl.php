<div class="cart-tray cart-tray-box">
  <div class="tray-area">

    <div class="centered-tray-box">

    <div class="drop-here tray-status"><?php echo func_htmlspecialchars($this->t('Drop items here to shop')); ?></div>

    <div class="dropped-here tray-status"><?php echo func_htmlspecialchars($this->t('Product has been added to cart')); ?></div>

    <div class="product-added tray-status">
      <?php $this->getWidget(array('label' => 'Checkout', 'location' => $this->buildURL('checkout')), '\XLite\View\Button\Link')->display(); ?>
    </div>

    <div class="progress-bar">
      <div class="wait-progress">
        <div></div>
      </div>
    </div>

    </div>

  </div>
</div>
<div class="preload-cart-tray"></div>
