<div class="simple-search-product-form">

  <?php $this->getWidget(array(), '\XLite\View\Form\Product\Search\Customer\SimpleForm', 'simple_products_search')->display(); ?>
    <?php $this->displayViewListContent('product.simple-search-form.simple-box'); ?>
  <?php $this->getWidget(array('end' => '1'), null, 'simple_products_search')->display(); ?>

</div>
