<?php
/**
 * Oggetto Web extension for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade
 * the Oggetto Ajax module to newer versions in the future.
 * If you wish to customize the Oggetto Ajax module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Oggetto
 * @package    Oggetto_Ajax
 * @copyright  Copyright (C) 2011 Oggetto Web ltd (http://oggettoweb.com/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Ajax helper
 *
 * @category   Oggetto
 * @package    Oggetto_Ajax
 * @subpackage Helper
 * @author     Vladimir Fishchenko <fishchenko@oggettoweb.com>
 */
class Oggetto_Ajax_Helper_Data extends Mage_Core_Helper_Data
{
    /**
     * Set Response Body
     *
     * @param Oggetto_Ajax_Model_Response $response Response object
     *
     * @return Zend_Controller_Response_Abstract
     */
    public function sendResponse(Oggetto_Ajax_Model_Response $response)
    {
        Mage::app()->getResponse()->setHeader('Content-type', 'application/json');
        return Mage::app()->getResponse()->setBody($response->asJson());
    }

    /**
     * Set response error
     *
     * @param string $message Error message
     *
     * @return Zend_Controller_Response_Abstract
     */
    public function sendError($message)
    {
        return $this->sendResponse(
            Mage::getModel('ajax/response')->error()->setMessage($message)
        );
    }

    /**
     * Set response success
     *
     * @param array $data Success response data
     *
     * @return Zend_Controller_Response_Abstract
     */
    public function sendSuccess($data = array())
    {
        return $this->sendResponse(
            Mage::getModel('ajax/response')->success()->addData($data)
        );
    }
}
