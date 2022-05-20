<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Block;

class Qa extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    protected $customerSession;
    protected $qa;
    protected $customers;
    protected $scopeConfig;


    /**
     * Constructor
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct (
        \Magento\Framework\View\Element\Template\Context   $context,
        \Magento\Customer\Model\Session                    $customerSession,
        \Magento\Framework\Registry                        $registry,
        \Sundari\Pqa\Model\QaFactory                       $qa,
        \Magento\Customer\Model\Customer                   $customers,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,


        array                                              $data = []
    )
    {
        $this->registry = $registry;
        $this->customerSession = $customerSession;
        $this->qa = $qa;
        $this->customers = $customers;
        $this->scopeConfig = $scopeConfig;


        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getqaCollection ()
    {
        $collection = $this->qa->create()
            ->getCollection()->addFieldToSelect('*')->load();
        return $collection;
    }

    public function getCustomer ()
    {
        return $this->customerSession->getCustomer()->getId();
    }

    public function getCustomerName ($cid)
    {
        $customer = $this->customers->load($cid);
        return $customer->getFirstname();
    }

    public function getQaEnable ()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue('pqa/qa/enable', $storeScope);
    }

    public function getCollectionCount ()
    {
        $collection = $this->qa->create()
            ->getCollection()->addFieldToSelect('*')->addFieldToFilter('productid', $this->getCurrentProduct())->load();
        return $collection->count();
    }

    public function getCurrentProduct ()
    {
        return $this->registry->registry('current_product')->getId();
    }

}

