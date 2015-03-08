<?php if ($this->isVisibleAverageRatingOnPage()): ?><div class="rating<?php if ($this->isAllowedRateProduct()){?> edit<?php }?>" >
  <?php if ($this->isAllowedRateProduct()):
  $this->getWidget(array('fieldName' => 'rating', 'rate' => $this->getAverageRating(), 'is_editable' => $this->isAllowedRateProduct(), 'max' => '5'), '\XLite\Module\XC\Reviews\View\FormField\Input\Rating')->display();
endif; ?>
  <?php if (!($this->isAllowedRateProduct())):
  $this->getWidget(array('rate' => $this->getAverageRating(), 'max' => '5'), '\XLite\Module\XC\Reviews\View\VoteBar')->display();
endif; ?>
  <br />

  <?php if (!('tab'==$this->get('place'))): ?><div  class="rating-tooltip">
    <?php $this->displayViewListContent('reviews.tooltip.rating'); ?>
  </div><?php endif; ?>

</div><?php endif; ?>
