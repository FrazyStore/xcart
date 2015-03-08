<?php if (!($this->get('cart')->checkCart())): ?><div  class="reason-details">
  <?php echo $this->getDisabledReason(); ?>
</div><?php endif; ?>
