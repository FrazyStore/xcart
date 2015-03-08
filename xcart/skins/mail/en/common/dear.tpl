{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * 'Dear customer' template
 *
 * @author    Qualiteam software Ltd <info@x-cart.com>
 * @copyright Copyright (c) 2011-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license   http://www.x-cart.com/license-agreement.html X-Cart 5 License Agreement
 * @link      http://www.x-cart.com/
 *}
{if:address.firstname|address.lastname}
{t(#Dear X#,_ARRAY_(#firstname#^address.firstname,#lastname#^address.lastname)):h}

{else:}
{t(#Dear customer#):h}

{end:}
