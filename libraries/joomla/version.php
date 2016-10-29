<?php
/**
* @version		$Id: CHANGELOG.php 0000003 03-25-2013 19:04 Shankara
* @package		Joomla
* @copyright	2013 proinsurer.com.ua
 */
defined('JPATH_BASE') or die();
/**
 * Version information
 *
 * @package	Joomla.Framework
 * @since	1.0
 */
class JVersion
{
	/** @var string Product */
	var $PRODUCT 	= 'Joomla!';
	/** @var int Main Release Level */
	var $RELEASE 	= '1.5';
	/** @var string Development Status */
	var $DEV_STATUS = 'Stable';
	/** @var int Sub Release Level */
	var $DEV_LEVEL 	= '27';
	/** @var int build Number */
	var $BUILD	= '';
	/** @var string Codename */
	var $CODENAME 	= 'joomla pro v1.5.27';
	/** @var string Date */
	var $RELDATE 	= '25-March-2013';
	/** @var string Time */
	var $RELTIME 	= '19:04';
	/** @var string Timezone */
	var $RELTZ 	= 'GMT';
	/** @var string Copyright Text */
	var $COPYRIGHT 	= 'Copyright (C) 2013 Open Source Matters. All rights reserved.';
	/** @var string URL */
	var $URL 	= '<a href="http://www.proinsurer.com.ua">Proinsurer</a> - поддержка линейки Joomla v1.5.';

	/**
	 *
	 *
	 * @return string Long format version
	 */
	function getLongVersion()
	{
		return $this->PRODUCT .' '. $this->RELEASE .'.'. $this->DEV_LEVEL .' '
			. $this->DEV_STATUS
			.' [ '.$this->CODENAME .' ] '. $this->RELDATE .' '
			. $this->RELTIME .' '. $this->RELTZ;
	}

	/**
	 *
	 *
	 * @return string Short version format
	 */
	function getShortVersion() {
		return $this->RELEASE .'.'. $this->DEV_LEVEL;
	}

	/**
	 *
	 *
	 * @return string Version suffix for help files
	 */
	function getHelpVersion()
	{
		if ($this->RELEASE > '1.0') {
			return '.' . str_replace( '.', '', $this->RELEASE );
		} else {
			return '';
		}
	}

	/**
	 * Compares two "A PHP standardized" version number against the current Joomla! version
	 *
	 * @return boolean
	 * @see http://www.php.net/version_compare
	 */
	function isCompatible ( $minimum ) {
		return (version_compare( JVERSION, $minimum, 'eq' ) == 1);
	}
}
