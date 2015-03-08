<div class="vote-bar<?php if ($this->isEditable()){?> editable<?php }?>">

  <div class="stars-row">
    <?php $num = isset($this->num) ? $this->num : null; $_foreach_var = $this->getStarsCount(); if (isset($_foreach_var)) { $this->numArraySize=count($_foreach_var); $this->numArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->num){ $this->numArrayPointer++; ?><div  class="star-single"><span class="fa fa-star"></span></div>
<?php } $this->num = $num; ?>
  </div>

  <div class="stars-row static"  style="width: <?php echo func_htmlspecialchars($this->getPercent()); ?>%;">
    <div class="stars-row full">
      <?php $num = isset($this->num) ? $this->num : null; $_foreach_var = $this->getStarsCount(); if (isset($_foreach_var)) { $this->numArraySize=count($_foreach_var); $this->numArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->num){ $this->numArrayPointer++; ?><div  class="star-single"><span class="fa fa-star"></span></div>
<?php } $this->num = $num; ?>
    </div>
  </div>

  <?php if ($this->isEditable()){?>
  <div class="stars-row hovered" style="display: none;">
    <?php $num = isset($this->num) ? $this->num : null; $_foreach_var = $this->getStarsCount(); if (isset($_foreach_var)) { $this->numArraySize=count($_foreach_var); $this->numArrayPointer=0; } if (isset($_foreach_var)) foreach ($_foreach_var as $this->num){ $this->numArrayPointer++; ?><div  class="star-single star-num-<?php echo func_htmlspecialchars($this->get('num')); ?>"><span class="fa fa-star"></span></div>
<?php } $this->num = $num; ?>
  </div>

  <input type="hidden" name="<?php echo func_htmlspecialchars($this->getFieldName()); ?>" value="<?php echo func_htmlspecialchars($this->getRating()); ?>" />
  <?php }?>

</div>
