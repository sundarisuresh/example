<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Order;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;

/**
 *
 */
class Index extends Template
{
    /**`
     * @var Logo
     */
    protected $customerSession;
    protected $orderRepository;
    private $orderCollectionFactory;




    /**
     * Constructor
     * @param Context $context
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context $context,
        \Magento\Customer\Model\Session $customerSession,
        CollectionFactory $orderCollectionFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,



        array   $data = []
    )
    {
        $this->customerSession = $customerSession;
        $this->orderRepository = $orderRepository;
        $this->orderCollectionFactory = $orderCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getLastOrder()
    {
        $customerId= $this->customerSession->getCustomer()->getId();
        $orderCollection = $this->orderCollectionFactory->create()
            ->addFieldToFilter('customer_id', $customerId);
        $lastorder=$orderCollection->setOrder('entity_id','DESC');
        return $lastorder->getFirstItem();
//        return $customerOrder->getData();
//        $orderId = $this->checkoutSession->getData('last_order_id');
//        exit;
//        $order = $this->orderRepository->get($orderId);
//return $order;


    }

}

