{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Submit button
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     1.0.0
 *}
<button type="submit"{if:hasName()} name="{getName()}"{end:}{if:hasValue()} value="{getValue()}"{end:}{if:hasClass()} class="{getClass()}"{end:}><span>{getButtonLabel()}</span></button>
