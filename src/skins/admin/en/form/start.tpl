{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Form start
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     1.0.0
 *}

<form action="{getFormAction()}" method="{getParam(#formMethod#)}" name="{getFormName()}" onsubmit="javascript: {getJSOnSubmitCode()}"{if:getParam(#className#)} class="{getParam(#className#)}"{end:}{if:isMultipart()} enctype="multipart/form-data"{end:}>
<fieldset>
<input FOREACH="getFormParams(),paramName,paramValue" type="hidden" name="{paramName}" value="{paramValue}" />
</fieldset>

