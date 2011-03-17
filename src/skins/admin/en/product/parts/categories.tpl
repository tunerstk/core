{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Product element
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="product.modify.list", weight="30")
 *}
<tr>
  <td>
  <table cellpadding="0" cellspacing="0" width="100%">
  <tr>
      <td class="table-label" width="100%">{t(#Category#)}</td>
        <td class="star">&nbsp;*&nbsp;</td>
  </tr>
  </table>
  </td>
  <td>
    <table cellpadding="0" cellspacing="0" width="100%">
      <tr><widget class="\XLite\View\FormField\Select\Categories" fieldName="{getNamePostedData(##,#category_ids#)}" fieldOnly=true value="{product.getCategories()}" /></tr>
    </table>
    </td>
</tr>
