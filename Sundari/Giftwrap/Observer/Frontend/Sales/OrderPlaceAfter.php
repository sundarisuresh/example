<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Sundari\Giftwrap\Observer\Frontend\Sales;

class OrderPlaceAfter implements \Magento\Framework\Event\ObserverInterface
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
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/templog.log');
$logger = new \Zend\Log\Logger();

$logger->addWriter($writer);

$logger->info("Order");



        $order = $observer->getEvent()->getOrder();

        $logger->info("Order".$order->getId());

        $logger->info("Order". $order->getGrandTotal());


        $total= $order->getGrandTotal();
        if($total>100)
        {
            $logger->info("came inside");

            
            $order->setData('giftwrap',1);
            $order->save();

        }

        //Your observer code
    }
}

