<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Block;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Customer\Model\Customer;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\ScopeInterface;
use Sundari\Productfaq\Model\PqaFactory;
use Sundari\Productfaq\Model\VoteFactory;

/**
 *
 */
class Productqa extends Template
{
    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var Session
     */
    protected $customerSession;
    /**
     * @var PqaFactory
     */
    protected $pqa;
    /**
     * @var CollectionFactory
     */
    protected $customers;
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var VoteFactory
     */
    protected $vote;


    /**
     * Constructor
     * @param Context $context
     * @param PqaFactory $pqa
     * @param CollectionFactory $productCollectionFactory
     * @param Session $customerSession
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context              $context,
        PqaFactory           $pqa,
        VoteFactory          $vote,
        Customer             $customers,
        ScopeConfigInterface $scopeConfig,
        Session              $customerSession,
        Registry             $registry,
        array                $data = []
    ) {
        $this->registry = $registry;
        $this->customerSession = $customerSession;
        $this->pqa = $pqa;
        $this->vote = $vote;
        $this->customer = $customers;
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerSession->getCustomer()->getId();
    }

    /**
     * @param $customerId
     * @return string
     */
    public function getCustomer($customerId)
    {
        //Get customer by customerID
        $customer = $this->customer->load($customerId);
        return $customer->getFirstname(); //Print Customer First Name
    }

    /**
     * @return mixed
     */
    public function getIspqaEnable()
    {
        $storeScope = ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue("product/pqa/form", $storeScope);
    }

    /**
     * @return void
     */
    public function getProductqaCollection()
    {
        $collection = $this->pqa->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('productid', $this->getCurrentProduct())->load();

        return $collection;
    }

    /**
     * @return mixed
     */
    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product')->getId();
    }

    /**
     * @param $qid
     * @return array
     */
    public function getvoteqaCollection($qid)
    {
        $collection = $this->vote->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $qid)
            ->addFieldToFilter('upvote', 1)
            ->load();
        $collection1 = $this->vote->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $qid)
            ->addFieldToFilter('downvote', 1)
            ->load();

        return $count = [$collection->count(), $collection1->count()];
    }
}
