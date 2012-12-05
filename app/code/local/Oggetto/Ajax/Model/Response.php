<?php
/**
 * Oggetto common ajax stuff extension for Magento
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
 * @copyright  Copyright (C) 2011 Oggetto Web (http://oggettoweb.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Ajax response
 *
 * @category   Oggetto
 * @package    Oggetto_Ajax
 * @subpackage Model
 * @author     Dan Kocherga <dan@oggettoweb.com>
 */
class Oggetto_Ajax_Model_Response extends Varien_Object
{
    /**
     * Success status code
     */
    const SUCCESS = 'success';

    /**
     * Error status code
     */
    const ERROR = 'error';

    /**
     * Redirect status code
     */
    const REDIRECT = 'redirect';

    /**
     * Set response as successfull
     *
     * @return Oggetto_Ajaxcart_Model_Response
     */
    public function success()
    {
        return $this->setStatus(self::SUCCESS);
    }

    /**
     * Set response as error
     *
     * @return Oggetto_Ajaxcart_Model_Response
     */
    public function error()
    {
        return $this->setStatus(self::ERROR);
    }

    /**
     * Set response as redirect
     *
     * @return Oggetto_Ajaxcart_Model_Response
     */
    public function redirect()
    {
        return $this->setStatus(self::REDIRECT);
    }

    /**
     * Transform response to JSON format
     *
     * @return string
     */
    public function asJson()
    {
        return Mage::helper('core')->jsonEncode($this->getData());
    }
}
