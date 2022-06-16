<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Rewards\Observer\Sales;

class OrderCommitAfter implements \Magento\Framework\Event\ObserverInterface
{
    private $_customerRepositoryInterface;

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */

    /**
     * Execute observer
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        $order = $observer->getEvent()->getOrder();
        $total = $order->getGrandTotal();
        $original = $order->getShippingAmount() + $order->getBaseSubtotal();
        $reward = $original - $total;
        $customer = $this->_customerRepositoryInterface->getById($order->getCustomerId());
        $pre = $customer->getCustomAttribute('reward')->getValue();
        $customer->setCustomAttribute('reward', $pre - $reward);
        $this->_customerRepositoryInterface->save($customer);
    }
}
