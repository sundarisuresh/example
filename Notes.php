$customer = $this->customerSession->getCustomer();
if (!$customer->getId()) {
return false;
}
$customer = $this->customerRepositoryInterface->getById($customer->getId());
if (!$customer->getCustomAttribute('creditbalance')) {
return false;
}
$grandTotal = $this->cart->getQuote()->getGrandTotal();

if ($customer->getCustomAttribute('creditbalance')->getValue() < $grandTotal) {
return false;
}


// $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
//        $logger = new \Zend_Log();
//        $logger->addWriter($writer);
//        $logger->info('text 123');
