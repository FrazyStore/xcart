{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * ____file_title____
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
{t(#Your order has been shipped#,_ARRAY_(#id#^order.getOrderNumber())):h} {t(#Thank you for your order FOOTER#):h}
<hr />
<p>
<widget class="\XLite\View\Invoice" order="{order}" />

<list IF="!order.trackingNumbers.isEmpty()" name="tracking.info" order="{order}" trackingNumbers="{order.trackingNumbers}" />

<p>
{signature:h}
</body>
</html>
