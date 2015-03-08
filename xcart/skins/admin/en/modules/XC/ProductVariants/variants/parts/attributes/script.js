/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Attributes
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */

jQuery().ready(
  function () {
    jQuery('div.attributes div.checkbox').click(
      function () {
        jQuery(this).find('input[type=checkbox]').click();
        checkCreateVariants();
      }
    );

    jQuery('div.attributes div.values').click(
      function () {
        jQuery(this).parent().toggleClass('fade-variant');
      }
    );

    jQuery('div.attributes div.checkbox input').change(
      function (event) {
        if (jQuery(this).prop('checked')) {
          jQuery(this).parent().addClass('checked');
        } else {
          jQuery(this).parent().removeClass('checked');
        }
        checkCreateVariants();
      }
    ).click(
      function (event) {
        event.stopPropagation();
      }
    );

    jQuery('a.submit-form').click(
      function () {
        jQuery('form.form-attributes input[name=action]').val(jQuery(this).data('mode'));
        jQuery('form.form-attributes').submit();
        return false;
      }
    );

    jQuery('div.variants-are-based button').click(
      function () {
        jQuery('div.variants-are-based').hide();
        jQuery('div.variants').hide();
        jQuery('div.sticky-panel').hide();
        jQuery('div.attributes').removeClass('hidden');
      }
    );

    jQuery('div.attributes button.cancel').click(
      function () {
        jQuery('div.variants-are-based').show();
        jQuery('div.variants').show();
        jQuery('div.sticky-panel').show();
        jQuery('div.attributes').addClass('hidden');
      }
    );

    checkCreateVariants();
  }
);

function checkCreateVariants() {
    var variantsCount = 1;
    jQuery('div.attributes input:checked').each(
      function() {
        variantsCount *= jQuery(this).data('count');
      }
    );

    if (variantsCount > 1) {
        jQuery('.create-variants').show();
        jQuery('div.attributes').addClass('checked');
        jQuery('div.attributes .save-changes span').text(jQuery('div.attributes .buttons').data('attributes-title'));

    } else {
        jQuery('.create-variants').hide();
        jQuery('div.attributes').removeClass('checked');
        jQuery('div.attributes .save-changes span').text(jQuery('div.attributes .buttons').data('no-attributes-title'));
    }

    jQuery('.variants-count').text('(' + variantsCount + ')');
}
