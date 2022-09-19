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


<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Verify;

use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Twilio\Rest\Client;

class Index extends \Magento\Framework\App\Action\Action
{    protected $request;


    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    private \Magento\Customer\Model\Session $_customerSession;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                \Magento\Framework\App\Action\Context       $context,
                                \Magento\Customer\Model\Session $customerSession,
                                \Magento\Framework\App\Request\Http         $request
    )
    {        $this->request = $request;
        $this->_customerSession = $customerSession;

        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $phone = $this->request->getParam("phone");
        $otp  = $this->randNum();
        $this->_customerSession->setOtp($otp);
        echo $otp;
//        exit;
        $sid    = "AC478d735f436986f7d2b6487aa9a977da";
        $token  = "7bbe05dc74d98d63ce57bda7ff3e964d";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create("+91".$phone, // to
                array(
                    "from" => "+18158699964",
                    "messagingServiceSid" => "MG04f723e194d7568e19027238e7e18ee1",
                    "body" => "Your OTP is ".$otp
                )
            );

        print($message->sid);
        return $this->resultPageFactory->create();
    }

    private function randNum()
    {
        $digits = 4;
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }
}

Public Key: c2e9ca4e2694a1706e4139ff8eb535b0
Private Key: d1748ca36f96e6251f0f9da69eb63468
