<?php echo func_htmlspecialchars($this->t('Old price')); ?>: <span class="value"><?php echo func_htmlspecialchars($this->formatPrice($this->getOldPrice(),$this->get('null'),1)); ?></span>
