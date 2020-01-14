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
	public static function getList(&$params)
	{
		$content = $params->get('notes');

		// Replace 'images/' to '../images/' when using an image from /images in backend
		$content = preg_replace('*src\=\"(?!administrator\/)images/*', 'src="../images/', $content);
		// Replace 'media/' to '../media/' when using emoticons from /media in backend
		$content = preg_replace('*src\=\"(?!administrator\/)media/*', 'src="../media/', $content);

		return (string) $content;
	}
}
