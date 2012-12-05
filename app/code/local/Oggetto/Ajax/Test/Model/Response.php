<?php
/**
 * Oggetto common ajax stuff extension for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade
 * the Oggetto Ajax module to newer versions in the future.
 * If you wish to customize the Oggetto Ajax module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Oggetto
 * @package    Oggetto_Mark
 * @copyright  Copyright (C) 2011 Oggetto Web ltd (http://oggettoweb.com/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Ajax response model test case
 *
 * @category   Oggetto
 * @package    Oggetto_Ajax
 * @copyright  Copyright (C) 2011
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Oggetto_Ajax_Test_Model_Response extends EcomDev_PHPUnit_Test_Case
{
    /**
     * Test success state
     *
     * @return void
     */
    public function testSuccess()
    {
        $response = Mage::getModel('ajax/response')
            ->success()->setContent('Cart content');
        $this->assertEquals(
            array('status' => 'success', 'content' => 'Cart content'),
            Mage::helper('core')->jsonDecode($response->asJson())
        );
    }

    /**
     * Test error state
     *
     * @return void
     */
    public function testError()
    {
        $response = Mage::getModel('ajax/response')
            ->error()->setMessage('Bad thing');
        $this->assertEquals(
            array('status' => 'error', 'message' => 'Bad thing'),
            Mage::helper('core')->jsonDecode($response->asJson())
        );
    }

    /**
     * Test redirect state
     *
     * @return void
     */
    public function testRedirect()
    {
        $response = Mage::getModel('ajax/response')
            ->redirect()
            ->setUrl('http://google.com');
        $this->assertEquals(
            array('status' => 'redirect', 'url' => 'http://google.com'),
            Mage::helper('core')->jsonDecode($response->asJson())
        );
    }
}
