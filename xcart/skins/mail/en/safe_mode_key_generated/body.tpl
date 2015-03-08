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
<head>
  <title>{t(#Soft and Hard reset links for your store#)}</title>
</head>
<body>
  <p>{t(#This message provides the reset links for your X-Cart installation.#)}</p>

  <p>{t(#Soft reset (disables all modules except ones that were downloaded from marketplace)#)}:</p>
  <p>{soft_reset_url}</p>

  <p>{t(#Hard reset (disables all modules and runs application)#)}:</p>
  <p>{hard_reset_url}</p>

  <p>{t(#More info is available in X-Cart's Knowledge Base article 'What to do if you cannot access your store...'#,_ARRAY_(#article#^article_url)):h}</p>

</body>
</html>
