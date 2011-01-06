<?php
/**
 * Prattski
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA that can
 * be found on the web at the following URL:
 * http://store.prattski.com/LICENSE.txt
 *
 * @category    Prattski
 * @package     Prattski_Developer
 * @copyright   Copyright (c) 2010-2011 Prattski (http://prattski.com/)
 * @license     http://store.prattski.com/LICENSE.txt
 */

/**
 * Ip Address Block
 *
 * @category    Prattski
 * @package     Prattski_Developer
 */
class Prattski_Developer_Block_System_Config_Form_Field_Environment_Ipaddress
    extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * Cache management
     */
    protected function  _construct()
    {
        parent::_construct();

        $this->addData(array(
            'cache_lifetime'    => 300,
            'cache_tags'        => array(Mage_Core_Model_Config::CACHE_TAG),
            'cache_key'         => Prattski_Developer_Model_Environment_Ipaddress::CACHE_KEY,
        ));
    }

    /**
     * Build HTML
     *
     * @param   Varien_Data_Form_Element_Abstract $fieldset
     * @return  string
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $ipAddress = Mage::getModel('prattski_developer/environment_ipaddress');
        return $ipAddress->lookup();
    }
}
