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
<p>{t(#Thank you for shopping at X. We received your order Y. You will receive an order confirmation once your order is processed#,_ARRAY_(#company#^config.Company.company_name,#id#^order.orderNumber))}</p>
<p>
<widget class="\XLite\View\Invoice" order="{order}" />
</p>
<p>
{signature:h}
</p>
</body>
</html>
