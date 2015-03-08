<script type="text/javascript">
var xliteConfig = {
  script:   '<?php echo $this->getScript(); ?>',
  language: '<?php echo func_htmlspecialchars($this->get('currentLanguage')->getCode()); ?>',
  form_id: '<?php echo func_htmlspecialchars($this->getComplex('xlite.formId')); ?>',
  form_id_name: '<?php echo func_htmlspecialchars(\XLite::FORM_ID); ?>'
};
</script>
