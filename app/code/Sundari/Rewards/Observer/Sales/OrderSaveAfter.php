<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Rewards\Observer\Sales;

class OrderSaveAfter implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    private $_customerRepositoryInterface;

    /**
     * Execute observer
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    )
    {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(
        \Magento\Framework\Event\Observer $observer
    )
    {
        $order = $observer->getEvent()->getOrder();
        if ($order->getState() == 'complete') {
            $total = $order->getGrandTotal();
            $value = $total / 100 * 5;
            $customer = $this->_customerRepositoryInterface->getById($order->getCustomerId());
            $pre = $customer->getCustomAttribute('reward')->getValue();
            $customer->setCustomAttribute('reward', $value + $pre);
            $this->_customerRepositoryInterface->save($customer);
            //Your code after completer state goes to here
        }
        //Your observer code
    }
}
