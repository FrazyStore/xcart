/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * RegexMask 
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 */

(function ($){
    $.fn.regexMask = function (mask) {
        if (!mask) {
            throw 'mandatory mask argument missing';
        } else if (mask == 'float-ptbr') {
            mask = /^((\d{1,3}(\.\d{3})*(((\.\d{0,2}))|((\,\d*)?)))|(\d+(\,\d*)?))$/;
        } else if (mask == 'float-enus') {
            mask = /^((\d{1,3}(\,\d{3})*(((\,\d{0,2}))|((\.\d*)?)))|(\d+(\.\d*)?))$/;
        } else if (mask == 'integer') {
            mask = /^\d+$/;
        } else {
            try {
                mask.test("");
            } catch(e) {
                throw 'mask regex need to support test method';
            }
        }
        $(this).keypress(function (event) {
            if (!event.charCode) return true;
            var part1 = this.value.substring(0,this.selectionStart);
            var part2 = this.value.substring(this.selectionEnd,this.value.length);
            if (!mask.test(part1 + String.fromCharCode(event.charCode) + part2))
                return false;
        });
    };
})(jQuery);
