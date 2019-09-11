<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_adminnotes
 *
 * @copyright   Copyright (C) 2019. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper as JModuleHelper;

// Include the mod_adminnotes functions only once
JLoader::register('modAdminNotes', __DIR__ . '/helper.php');

$list = modAdminNotes::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_adminnotes', $params->get('layout', 'default'));
