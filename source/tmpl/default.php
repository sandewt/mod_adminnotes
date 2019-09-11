<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_adminnotes
 *
 * @copyright   Copyright (C) 2019. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

use Joomla\CMS\Factory as JFactory;
use Joomla\CMS\HTML\HTMLHelper as JHtml;
use Joomla\CMS\Language\Text as JText;
use Joomla\CMS\Router\Route as JRoute;

$user = JFactory::getuser();

if ($user->authorise('core.manage'))
{
	$link = 'index.php?option=com_modules&task=module.edit&id=' . (int) $module->id;
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
			<a class="btn btn-primary" href="<?php echo JRoute::_($link, true); ?>"><?php echo JText::_('MOD_ADMINNOTES_LINK_MODULE_EDIT'); ?></a>
		</div>
	<?php endif; ?>
	<?php if (!empty($list)) : ?>
		<div>
			<?php echo $list; ?>
		</div>
	<?php else : ?>
		<div class="alert alert-no-items">
			<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
		</div>
	<?php endif; ?>
	<div>
		<br /><span class="icon-calendar" aria-hidden="true"></span><?php echo JHtml::_('date', '', JText::_('DATE_FORMAT_LC2')); ?>
	</div>
</div>
<!-- End notes -->
