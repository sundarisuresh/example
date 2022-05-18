<?php

/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Sundari\Customerorders\Block;

use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;

class Customerorders extends \Magento\Framework\View\Element\Template

{
    protected $customerSession;
    private $orderCollectionFactory;


    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        CollectionFactory $orderCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
        $this->orderCollectionFactory = $orderCollectionFactory;
    }

    /**
     * @return string
     */
    public function getcustomerorders()
    {
        //echo"<pre>";
        $customer = $this->customerSession->getCustomer();
        $customerId = $customer->getId();
        
        $customerOrder = $this->orderCollectionFactory->create()
            ->addFieldToFilter('customer_id', $customerId);
        return $customerOrder->getData();
    }
}
