<?php if ($this->getSubcategories()): ?><ul class="subcategory-view-icons subcategory-list grid-list clearfix" >
  <?php $_foreach_var = $this->getSubcategories(); if (isset($_foreach_var)) { $this->subcategoryArraySize=count($_foreach_var); $this->subcategoryArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->subcategory){ $this->subcategoryArrayPointer++; ?>
  <?php if ($this->get('subcategory')->hasAvailableMembership()): ?><li >
    <a href="<?php echo func_htmlspecialchars($this->buildURL('category','',array('category_id'=>$this->getComplex('subcategory.category_id')))); ?>">
      <span class="subcategory-icon">
        <?php $this->getWidget(array('image' => $this->getComplex('subcategory.image'), 'maxWidth' => $this->getIconWidth(), 'maxHeight' => $this->getIconHeight(), 'centerImage' => '1', 'alt' => $this->getComplex('subcategory.name')), '\XLite\View\Image')->display(); ?>
      </span>
      <span class="subcategory-name"><?php echo func_htmlspecialchars($this->getComplex('subcategory.name')); ?></span>
    </a>
  </li><?php endif; ?>
  <?php }?>
  <?php $item = isset($this->item) ? $this->item : null; $_foreach_var = $this->getNestedViewList('children'); if (isset($_foreach_var)) { $this->itemArraySize=count($_foreach_var); $this->itemArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->item){ $this->itemArrayPointer++; ?><li ><?php echo func_htmlspecialchars($this->get('item')->display()); ?></li>
<?php } $this->item = $item; ?>
</ul><?php endif; ?>
<?php $this->displayViewListContent('subcategories.base'); ?>
