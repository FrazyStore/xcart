<ul class="menu menu-list<?php if (!($this->isSubtree())){?> catalog-categories catalog-categories-path<?php }?>">
  <?php $_foreach_var = $this->getCategories(); if (isset($_foreach_var)) { $this->_categoryArraySize=count($_foreach_var); $this->_categoryArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->idx => $this->_category){ $this->_categoryArrayPointer++; ?>
    <li <?php echo $this->displayItemClass($this->get('idx'),$this->get('_categoryArraySize'),$this->get('_category')); ?>>
      <a href="<?php echo func_htmlspecialchars($this->buildURL('category','',array('category_id'=>$this->getComplex('_category.category_id')))); ?>" <?php echo $this->displayLinkClass($this->get('idx'),$this->get('_categoryArraySize'),$this->get('_category')); ?>><?php echo func_htmlspecialchars($this->get('_category')->getName()); ?></a>
    </li>
  <?php }?>
  <?php $_foreach_var = $this->getViewList('topCategories.children',array('rootId'=>$this->getParam('rootId'),'is_subtree'=>$this->getParam('is_subtree'))); if (isset($_foreach_var)) { $this->wArraySize=count($_foreach_var); $this->wArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->idx => $this->w){ $this->wArrayPointer++; ?>
    <li <?php echo $this->displayListItemClass($this->get('idx'),$this->get('wArraySize'),$this->get('w')); ?>><?php echo func_htmlspecialchars($this->get('w')->display()); ?></li>
  <?php }?>
</ul>
