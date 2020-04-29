<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_config
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Cancel Controller for global configuration components
 *
 * @since  3.2
 */
class ConfigControllerComponentCancel extends ConfigControllerCanceladmin
{
	/**
	 * Application object - Redeclared for proper typehinting
	 *
	 * @var    JApplicationCms
	 * @since  3.2
	 */
	protected $app;

	/**
	 * Method to cancel global configuration component.
	 *
	 * @return  void
	 *
	 * @since   3.2
	 */
	public function execute()
	{
		$this->context = 'com_config.config.global';

		$this->component = $this->input->get('component');

		$returnUri = $this->input->get('return', null, 'base64');

		$redirect = 'index.php?option=' . $this->component;

		if (!empty($returnUri))
		{
			$redirect = base64_decode($returnUri);
		}

		// Don't redirect to an external URL.
		if (!JUri::isInternal($redirect))
		{
			$redirect = JUri::base();
		}

		$this->app->redirect(JRoute::_($redirect, false));

		parent::execute();
	}
}
