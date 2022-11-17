<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Observer\Sales;

use Magento\Sales\Model\Order;

class OrderSaveAfter implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        $order = $observer->getEvent()->getOrder();
        if ($order->getState() == 'new') {
            $order->setState('pending')->setStatus('pending_approval');
            $order->save();        }
        if ($order->getStatus() == 'complete' && !$order->getCompletedTime())
        {
            $currenttime = date('Y-m-d H:i:s');
            $order->setCompletedTime($currenttime);
            $order->save();
        }
        //Your observer code
    }
}

