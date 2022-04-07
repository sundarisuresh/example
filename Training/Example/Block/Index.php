<?php
namespace Training\Example\Block;
class Index extends \Magento\Framework\View\Element\Template
{    
    protected $scopeConfig;
         
    public function __construct(        
       \Magento\Framework\View\Element\Template\Context $context,
       \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,     
       array $data = []
    ) {        
       $this->scopeConfig = $scopeConfig;
       parent::__construct($context, $data);
   }



    public function getIsEnable()
    {
        return $this->scopeConfig->getValue('contactus/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function getName()
    {
        return $this->scopeConfig->getValue('contactus/general/name', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function getemail()
    {
        return $this->scopeConfig->getValue('contactus/general/contactemail', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function getTelephone()
    {
        return $this->scopeConfig->getValue('contactus/general/telephone', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function getComment()
    {
        return $this->scopeConfig->getValue('contactus/general/comment', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function getenabletel()
    {
        return $this->scopeConfig->getValue('contactus/general/enabletel', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

}