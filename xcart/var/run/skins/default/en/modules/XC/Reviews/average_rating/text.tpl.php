<div class="text">
  <?php if ($this->getAverageRating()): ?><div ><?php echo func_htmlspecialchars($this->t('Score: X. Votes: Y',array('score'=>$this->getAverageRating(),'votes'=>$this->getVotesCount()))); ?></div><?php endif; ?>
  <?php if ($this->getAverageRating()==0): ?><div ><?php echo func_htmlspecialchars($this->t('Not rated yet')); ?></div><?php endif; ?>
</div>
