<?php $this->getWidget(array('product_id' => $this->getRatedProductId(), 'target_widget' => '\\XLite\\Module\\XC\\Reviews\\View\\Customer\\ProductInfo\\ItemsList\\AverageRating'), '\XLite\Module\XC\Reviews\View\Form\AverageRating', 'rate-product')->display(); ?>

  <?php $this->displayViewListContent('reviews.product.rating.average', array('product' => $this->getRatedProduct(), 'widgetMode' => $this->getWidgetMode())); ?>

<?php $this->getWidget(array('end' => '1'), null, 'rate-product')->display(); ?>
