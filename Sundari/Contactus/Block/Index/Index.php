<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Contactus\Block\Index;


class Index extends \Magento\Framework\View\Element\Template
{
   
    protected $scopeConfig;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,

        array $data = []
    ) { 

        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }
    public function getEnable() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue('contactus/form/enable',$storeScope); //you get your value here
       }
    public function getEnablename() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue('contactus/form/name',$storeScope); //you get your value here
       } 
       public function getEnableemail() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue('contactus/form/email',$storeScope); //you get your value here
       }  
       public function getEnablephone() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue('contactus/form/phone',$storeScope); //you get your value here
       }
       public function getEnablecomment() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue('contactus/form/comment',$storeScope); //you get your value here
       }    
}

