<button <?php echo $this->printTagAttributes($this->getAttributes()); ?>>
  <span><?php echo func_htmlspecialchars($this->t($this->getButtonLabel())); ?></span>
</button>
