{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Modules main section list
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="itemsList.module.install.columns.module-description-section.info-element", weight="20")
 *}

<li class="downloads-counter{getDownloadsCSSClass(module)}" IF="module.getDownloads()>0">
  {t(#Popularity#)}: <span class="counter">{module.getDownloads()}</span>
</li>
