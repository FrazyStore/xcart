{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Message body
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}
<html>
<body>
<widget template="common/dear.tpl" address="{order.profile.billing_address}" />
<p>
  {t(#Your order processed. The files attached to the purchased products can be downloaded at#,_ARRAY_(#order_number#^order.getOrderNumber()))}
  <ul>
    <li FOREACH="order.getDownloadAttachments(),attachment"><a href="{attachment.getURL()}">{attachment.attachment.getPublicTitle()}</a></li>
  </ul>
</p>
{signature:h}
</body>
</html>
