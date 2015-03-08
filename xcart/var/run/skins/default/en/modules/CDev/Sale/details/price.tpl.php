<?php if ($this->participateSale()): ?><li  class="sale-banner">
  <div class="sale-banner-block">
    <div class="text"><?php echo func_htmlspecialchars($this->t('sale')); ?></div>
    <div class="percent"><?php echo $this->t('percent X off',array('percent'=>$this->getSalePercent())); ?></div>
  </div>
</li><?php endif; ?>
