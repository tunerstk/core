<?php
/*
PHPDoctor: The PHP Documentation Creator
Copyright (C) 2004 Paul James <paul@peej.co.uk>

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/** Represents a PHP function or method (member function).
 *
 * @package PHPDoctor
 */
class methodDoc extends executableDoc {

	/** The type of variable this method returns.
	 *
	 * @var type
	 */
	var $_returnType;

	/** Is this class abstract.
	 *
	 * @var bool
	 */
	var $_abstract = FALSE;

	/** Constructor
	 *
	 * @param str name Name of this element
	 * @param classDoc|methodDoc parent The parent of this element
	 * @param rootDoc root The root element
	 */
	function methodDoc($name, &$parent, &$root) {
		$this->_name = $name;
		$this->_parent =& $parent; // set reference to parent
		$this->_root =& $root; // set reference to root
		$this->_returnType =& new type('void', $root);
	}

	/** Add a parameter to this method.
	 *
	 * @param fieldDoc parameter
	 */
	function addParameter(&$parameter) {
		$this->_parameters[$parameter->name()] =& $parameter;
	}

	/** Get return type.
	 *
	 * @return type
	 */
	function returnType() {
		return $this->_returnType;
	}
	
	/** Format a return type for outputting. Recognised types are turned into
	 * HTML anchor tags to the documentation page for the class defining them.
	 *
	 * @return str The string representation of the return type
	 */
	function returnTypeAsString() {
		$myPackage =& $this->containingPackage();
		$classDoc =& $this->_returnType->asClassDoc();
		if ($classDoc) {
			$packageDoc =& $classDoc->containingPackage();
			return '<a href="'.str_repeat('../', $myPackage->depth() + 1).$packageDoc->asPath().'/'.$classDoc->name().'.html">'.$classDoc->name().'</a>';
		} else {
			return $this->_returnType->typeName();
		}
	}

	/** Is this construct a function.
	 *
	 * @return bool
	 */
	function isFunction() {
		if (get_class($this->_parent) == 'rootdoc') {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/** Is this construct a method.
	 *
	 * @return bool
	 */
	function isMethod() {
		if (get_class($this->_parent) == 'rootdoc') {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/** Return true if this class is abstract.
	 *
	 * @return bool
	 */
	function isAbstract() {
		return $this->_abstract;
	}

}

?>