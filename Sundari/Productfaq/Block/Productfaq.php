<?php

/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Sundari\Productfaq\Block;

class Productfaq extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    protected $faq;
    protected $customer;
    protected $scopeconfig;



    protected $customerSession;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Sundari\Productfaq\Model\FaqFactory $faq,
        \Magento\Customer\Model\Customer $customer,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,




        \Magento\Framework\Registry $registry,


        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->registry = $registry;
        $this->faq = $faq;
        $this->customer = $customer;
        $this->scopeConfig = $scopeConfig;




        $this->customerSession = $customerSession;
    }

    /**
     * @return string
     */
    public function getCurrentProduct()
    {
        $productid = $this->registry->registry('current_product')->getId();
        return $productid;
    }
    public function getCollection()
    {


        $collection =  $this->faq->create()->getCollection();
        $collection = $collection->addFieldToSelect('*')
            ->addFieldToFilter('productid', $this->getCurrentProduct())
            ->load();
        return $collection;
    }

    public function getCustomer()
    {

        $customer = $this->customerSession->getCustomer()->getId();
        return $customer;
    }
    public function getCustomerName($customerID)
    {
        $customerObj = $this->customer->load($customerID);
        return $customerObj->getFirstname();
    }
    public function getCollectionCount()
    {
        return  $this->getCollection()->count();
    }
    public function getIsQaEnable() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue("product/faq/enable", $storeScope); //you get your value here
       }
}
