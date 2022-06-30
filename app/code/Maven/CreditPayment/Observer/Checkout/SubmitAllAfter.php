<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Maven\CreditPayment\Observer\Checkout;

class SubmitAllAfter implements \Magento\Framework\Event\ObserverInterface
{
    private \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface;

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    )
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }
    public function execute(
        \Magento\Framework\Event\Observer $observer
    )
    {
        $order = $observer->getEvent()->getOrder();
        if ($order->getStatus() == 'credit') {
            $customer = $this->customerRepositoryInterface->getById($order->getCustomerId());
            $credit = $customer->getCustomAttribute('creditbalance')->getValue();
            $total = $order->getGrandTotal();
            $result = $credit - $total;
            $customer->setCustomAttribute('creditbalance', $result);
            $this->customerRepositoryInterface->save($customer);
        }
    }
}

