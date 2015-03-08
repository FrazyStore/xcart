<?php if ($this->isVisibleAverageRatingOnPage()): ?><div class="product-average-rating" >
  <input type="hidden" name="target_widget" value="\XLite\Module\XC\Reviews\View\Customer\ProductInfo\Details\AverageRating" />
  <input type="hidden" name="widgetMode" value="<?php echo func_htmlspecialchars($this->getWidgetMode()); ?>" />
  <?php $this->displayViewListContent('reviews.product.rating', array('product' => $this->getRatedProduct())); ?>
  <?php if ($this->isVisibleReviewsCount()&&$this->getReviewsCount()): ?><div  class="reviews-count no-reviews">
    <a href="<?php echo func_htmlspecialchars($this->getRatedProductURL()); ?>" class="link-to-tab">
      <?php echo func_htmlspecialchars($this->t('Reviews: X',array('count'=>$this->getReviewsCount()))); ?>
    </a>
  </div><?php endif; ?>
  <?php if ($this->isVisibleReviewsCount()&&$this->getReviewsCount()==0): ?><div  class="reviews-count">
    <?php echo func_htmlspecialchars($this->t('No reviews.')); ?>
    <a href="<?php echo func_htmlspecialchars($this->getRatedProductURL()); ?>" class="link-to-tab">
      <?php echo func_htmlspecialchars($this->t('Be the first and leave a feedback.')); ?>
    </a>
  </div><?php endif; ?>
</div><?php endif; ?>
