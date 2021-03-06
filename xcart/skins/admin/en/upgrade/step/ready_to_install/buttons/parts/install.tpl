{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * The "Continue" button
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2015 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="upgrade.step.ready_to_install.buttons.sections.right", weight="200")
 *}

<widget IF="isNextStepAvailable()" class="\XLite\View\Button\Submit" label="{t(#Install updates#)}" disabled=true style="regular-main-button disabled" />
