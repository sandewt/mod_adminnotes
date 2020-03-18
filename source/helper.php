<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_adminnotes
 *
 * @copyright   Copyright (C) 2019 - 2020. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Helper for mod_adminnotes
 *
 * @since  1.0.0
 */
abstract class modAdminNotes
{
	/**
	 * Get a list of the administrator notes.
	 *
	 * @param   JObject  &$params  The module parameters.
	 *
	 * @return  string
	 */
	public static function getList(&$params): string
	{
		$content = (string) $params->get('notes');

		$replacement = array(
			'*src\=\"(?!administrator\/)images/*' => 'src="../images/',
			'*src\=\"(?!administrator\/)media/*' => 'src="../media/'
		);

		foreach ($replacement as $key => $value)
		{
			$content = preg_replace($key, $value, $content);
		}

		return (string) $content;
	}
}
