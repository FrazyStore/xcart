<?php if ($this->isSortBySelectorVisible()): ?><div  class="sort-box">

  <ul class="display-sort sort-crit grid-list" id="<?php echo func_htmlspecialchars($this->getSortWidgetId($this->get('true'))); ?>">
  <?php $_foreach_var = $this->get('sortByModes'); if (isset($_foreach_var)) { $this->nameArraySize=count($_foreach_var); $this->nameArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->key => $this->name){ $this->nameArrayPointer++; ?>
  <li class="list-type-grid <?php if ($this->isSortByModeSelected($this->get('key'))){?> selected<?php }?>">
    <a data-sort-by="<?php echo func_htmlspecialchars($this->get('key')); ?>" data-sort-order="<?php echo func_htmlspecialchars($this->getSortOrderToChange($this->get('key'))); ?>" href="<?php echo func_htmlspecialchars($this->getActionURL(array('sortBy'=>$this->get('key'),'sortOrder'=>$this->getSortOrderToChange()))); ?>">
      <?php echo func_htmlspecialchars($this->t($this->get('name'))); ?><i class="sort-arrow <?php echo func_htmlspecialchars($this->getSortArrowClassCSS($this->get('key'))); ?>"></i>
    </a>
  </li>
  <?php }?>
  </ul>

</div><?php endif; ?>
