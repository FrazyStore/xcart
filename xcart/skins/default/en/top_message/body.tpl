{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Top messages
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}

<div class="status-messages-wrapper">
  <div class="status-messages-wrapper2">

    <div id="status-messages" {if:isHidden()} style="display: none;"{end:}>

      <a href="#" class="close" title="{t(#Close#)}"><img src="images/spacer.gif" alt="{t(#Close#)}" /></a>

      <ul IF="hasTopMessages()">
        <li FOREACH="getTopMessages(),data" class="{getType(data)}">
          <em IF="getPrefix(data)">{getPrefix(data)}</em>{getText(data):h}
        </li>
      </ul>

    </div>

  </div>
</div>
