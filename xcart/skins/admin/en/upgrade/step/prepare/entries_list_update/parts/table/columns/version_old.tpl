{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Entry old version
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *
 * @ListChild (list="upgrade.step.prepare.entries_list_update.sections.table.columns", weight="300")
 *}

<td IF="entry.isInstalled()" class="old-version">{entry.getVersionOld()}</td>
<td IF="!entry.isInstalled()" class="old-version">&mdash;</td>
