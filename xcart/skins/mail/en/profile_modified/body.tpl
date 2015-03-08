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
<head><title>{t(#Your profile modified#)}</title></head>
<body>

<p>{t(#Your profile has been modified. To view your profile information, log in at our site#,_ARRAY_(#url#^url)):h}</p>

<p IF="password">{t(#Your account password is X.#,_ARRAY_(#password#^password))}</p>

<p>{signature:h}</p>

</body>
</html>
