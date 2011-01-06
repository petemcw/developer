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
 * IP Address Model
 *
 * @category    Prattski
 * @package     Prattski_Developer
 */
class Prattski_Developer_Model_Environment_Ipaddress extends Varien_Object
{
    /**
     * @var string
     */
    const CACHE_KEY = 'prattski_developer_ip';

    /**
     * @var string
     */
    const WEB_SERVICE_URI = 'http://whatismyip.com/automation/n09230945.asp';

    /**
     * @var Zend_Http_Client
     */
    protected $_client;

    /**
     * HTTP client options
     * @var array
     */
    protected $_options = array(
        'timeout' => 10,
    );

    /**
     * Constructor
     *
     * @return  void
     */
    public function _construct()
    {
        $this->_client = new Zend_Http_Client(self::WEB_SERVICE_URI);
        $this->_client->setConfig($this->_options);
    }

    /**
     * Fetch IP address. WhatIsMyIp.com requests a limit of one page hit every
     * 300 seconds.
     *
     * @return  string
     */
    public function lookup()
    {
        $response = $this->_client->request();
        if ($response->getStatus() == 200) {
            $data = $response->getBody();
        } else {
            $data = 'Unavailable: ' . $response->getMessage();
        }

        return $data;
    }
}