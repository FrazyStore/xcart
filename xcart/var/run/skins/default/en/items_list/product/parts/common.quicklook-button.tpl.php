<?php if ($this->isQuickLookEnabled()): ?><div  class="quicklook">
  <a
    href="<?php echo func_htmlspecialchars($this->buildURL('product','',array('product_id'=>$this->getComplex('product.product_id'),'category_id'=>$this->get('categoryId')))); ?>"
    class="quicklook-link quicklook-link-<?php echo func_htmlspecialchars($this->getComplex('product.product_id')); ?> quicklook-link-category-<?php echo func_htmlspecialchars($this->get('categoryId')); ?>">
    <div class="quicklook-view">&nbsp;</div>
  </a>
</div><?php endif; ?>
