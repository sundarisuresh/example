<?php
namespace Training\Engrave\Plugin\Quote;

class OrderItem
{
    public function aroundConvert(
        \Magento\Quote\Model\Quote\Item\ToOrderItem $subject,
        \Closure $proceed,
        \Magento\Quote\Model\Quote\Item\AbstractItem $item,
        $additional = []

    ) {
        /** @var $orderItem Item */
        $orderItem = $proceed($item, $additional);
        $orderItem->setEngrave($item->getEngrave());
        return $orderItem;
    }
}
//$writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
//$logger = new \Zend_Log();
//$logger->addWriter($writer);
//        $logger->info('text message');
//$logger->info(print_r($orderItem->getName(), true));
