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

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

$user     = Factory::getuser();
$moduleId = isset($module->id) ? $module->id : '';

if ($user->authorise('core.manage'))
{
	$uri  = Uri::getInstance();
	$link = 'index.php?option=com_modules&task=module.edit&id=' . (int) $moduleId . '&return=' . urlencode($uri);
}
else
{
	$link = '';
}

?>
<!-- Begin notes -->
<div>
	<?php if (!empty($link)) : ?>
		<div class="alert alert-info">
			<a class="btn btn-primary" href="<?php echo Route::_($link, true); ?>"><?php echo Text::_('MOD_ADMINNOTES_LINK_MODULE_EDIT'); ?></a>
		</div>
	<?php endif; ?>
	<div class="alert alert-info">
		<?php if (!empty($list)) : ?>
			<div>
				<?php echo $list; ?>
			</div>
		<?php else : ?>
			<div class="alert alert-no-items">
				<?php echo Text::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
			</div>
		<?php endif; ?>
	</div>
	<div>
		<span class="icon-calendar" aria-hidden="true"></span><?php echo HTMLHelper::_('date', '', Text::_('DATE_FORMAT_LC2')); ?>
	</div>
</div>
<!-- End notes -->
