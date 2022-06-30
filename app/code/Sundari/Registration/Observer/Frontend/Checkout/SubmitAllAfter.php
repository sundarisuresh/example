<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Registration\Observer\Frontend\Checkout;

class SubmitAllAfter implements \Magento\Framework\Event\ObserverInterface
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
        /* @var $order \Magento\Sales\Model\Order */
        $order = $observer->getEvent()->getData('order');
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/reg.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);

        $logger->info("sssss". $order->getId() );

        //Your observer code
    }
}

