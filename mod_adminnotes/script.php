<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_adminnotes
 *
 * @copyright   Copyright (C) 2019 - 2020. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;

/**
 * InstallerScript for mod_adminnotes
 *
 * @since  April 2020
 */
class mod_adminnotesInstallerScript
{
	/**
	 * Runs right after any installation action is performed on the module.
	 *
	 * @param  string    $type   - Type of PostFlight action. Possible values are:
	 *                           - * install
	 *                           - * update
	 *                           - * discover_install
	 * @param   stdClass $parent - Parent object calling object.
	 *
	 * @return void
	 */
	public function postflight($type, $parent)
	{
		$db = Factory::getDbo();

		$query = $db->getQuery(true)
			->select($db->quoteName('position'))
			->from($db->quoteName('#__modules'))
			->where($db->quoteName('module') . ' = ' . $db->quote('mod_adminnotes'));	
		$db->setQuery($query);

		$result = $db->loadResult();

		if (empty($result))
		{
			$position = 'cpanel';
			$access   = 3;

			$query->clear()
				->update($db->quoteName('#__modules'))
				->set($db->quoteName('position') . ' = ' . $db->quote($position))
				->set($db->quoteName('access') . ' = ' . (int) $access)
				->where($db->quoteName('module') . ' = ' . $db->quote('mod_adminnotes'));
			$db->setQuery($query);
			$db->execute();	
		}
	}
}
