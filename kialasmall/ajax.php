<?php
/*
* 2007-2011 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2011 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

require_once(realpath(dirname(__FILE__).'/../../config/config.inc.php'));
require_once(realpath(dirname(__FILE__).'/../../init.php'));
require_once(_PS_MODULE_DIR_.'kialasmall/kialasmall.php');
require_once(_PS_MODULE_DIR_.'kialasmall/classes/SmKialaRequest.php');
require_once(_PS_MODULE_DIR_.'kialasmall/classes/SmExportFormat.php');
require_once(_PS_MODULE_DIR_.'kialasmall/classes/SmKialaOrder.php');
require_once(_PS_MODULE_DIR_.'kialasmall/classes/SmKialaCountry.php');

global $smarty, $cart;

$kiala = new KialaSmall();
if (!Tools::getValue('token') || Tools::getValue('token') != Configuration::get('KIALASMALL_SECURITY_TOKEN'))
	die($kiala->l('Invalid security token'));

if (Tools::getValue('page_name'))
{
	echo $kiala->displayPoint(Tools::getValue('page_name'));
	die();
}
if (Tools::getValue('id_carrier'))
{
	$cart->id_carrier = (int)Tools::getValue('id_carrier');
	$cart->save();
}
