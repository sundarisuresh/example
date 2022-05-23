<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Emical\Block;

class Emical extends \Magento\Framework\View\Element\Template
{
    protected $emi;
    protected $request;
    protected $customerSession;
    protected $registry;
    protected $scopeConfig;



    /**
     * Constructor
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct (
        \Magento\Framework\View\Element\Template\Context $context,
        \Sundari\Emical\Model\EmiFactory                 $emi,
        \Magento\Framework\App\Request\Http              $request,
        \Magento\Customer\Model\Session     $customerSession,
        \Magento\Framework\Registry                        $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,


        array                                            $data = []
    )
    {
        $this->emi = $emi;
        $this->request = $request;
        $this->customerSession = $customerSession;
        $this->registry = $registry;
        $this->scopeConfig = $scopeConfig;




        parent::__construct($context, $data);
    }

    public function getEmi ()
    {
        return $this->getEmiCollection();
        foreach ($this->getEmiCollection() as $item) {
            $month=$item->getData('month');
            $interest=$item->getData('interest');
            $gender=$item->getData('gender');

        }

    }

    /**
     * @return string
     */
    public function getEmiCollection ()
    {
        $emi = $this->emi->create()
            ->getCollection()->addFieldToSelect('*')
//            ->addFieldToFilter('gender', 'female')
            ->load();
//        print_r($emi);
        return $emi;
    }
    function getGender ()
    {
        return $this->customerSession->getCustomer()->getGender();

    }
    function getCustomerId ()
    {
        return $this->customerSession->getCustomer()->getId();

    }
    public function getCurrentProduct ()
    {
        return $this->registry->registry('current_product')->getPrice();
    }
    public function getEmiEnable ()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue('emi/show/page', $storeScope);
    }
}

