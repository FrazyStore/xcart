{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * The "Continue" button
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="upgrade.step.prepare.buttons.sections", weight="200")
 *}

<widget IF="isNextStepAvailable()" class="\XLite\View\Button\Submit" style="regular-main-button main-button" label="{t(#Continue#)}" />
