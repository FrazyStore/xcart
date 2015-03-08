<?php if ($this->get('cart')->checkCart()):
  $this->getWidget(array('label' => 'Checkout', 'location' => $this->buildURL('checkout'), 'style' => 'regular-main-button checkout'), '\XLite\View\Button\Link')->display();
endif; ?>
<?php if (!($this->get('cart')->checkCart())):
  $this->getWidget(array('label' => 'Checkout', 'location' => $this->buildURL('checkout'), 'style' => 'regular-main-button checkout', 'disabled' => 'true'), '\XLite\View\Button\Link')->display();
endif; ?>
