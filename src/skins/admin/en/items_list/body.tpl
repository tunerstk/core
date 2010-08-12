{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * ____file_title____
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}

<div class="items-list {getSessionCell()}">

  <div class="list-pager">{pager.display()}</div>

  <div IF="isHeaderVisisble()" class="list-header">{displayViewListContent(#itemsList.admin.header#)}</div>

  <widget template="{getPageBodyTemplate()}" />

  <div class="list-pager">{pager.display()}</div>

  <p /><div IF="isFooterVisisble()" class="list-footer">{displayViewListContent(#itemsList.admin.footer#)}</div>

</div>

<script type="text/javascript">
  new {getJSHandlerClassName()}('{getSessionCell()}', {getURLParamsJS():h}, {getURLAJAXParamsJS():h});
</script>