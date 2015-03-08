<?php if ($this->isItemsPerPageVisible()): ?><div  class="pager-items-total">
  <?php echo func_htmlspecialchars($this->t('Items')); ?>:
  <?php echo $this->t('BEGIN - END of TOTAL',array('begin'=>$this->getBeginRecordNumber(),'end'=>$this->getEndRecordNumber(),'total'=>$this->getItemsTotal())); ?><?php if ($this->isItemsPerPageSelectorVisible()): ?><span >,
    <input type="text" value="<?php echo func_htmlspecialchars($this->getItemsPerPage()); ?>" class="page-length" title="<?php echo func_htmlspecialchars($this->t('Items per page')); ?>" /><?php echo func_htmlspecialchars($this->t('per page')); ?></span><?php endif; ?>
</div><?php endif; ?>
