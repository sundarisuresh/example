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

class Sendotp extends \Magento\Framework\App\Action\Action
{    protected $request;
    protected $catalogSession;


    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                \Magento\Framework\App\Action\Context       $context,

                                \Magento\Framework\App\Request\Http         $request,
                                \Magento\Catalog\Model\Session $catalogSession
)
    {        $this->request = $request;

        $this->resultPageFactory = $resultPageFactory;
        $this->catalogSession = $catalogSession;
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
        if (!$phone){
                    $phone = $this->catalogSession->getPhone();
        }
//        echo $phone; exit;
        $digits = 4;
        $otp= rand(pow(10, $digits-1), pow(10, $digits)-1);
        $sid    = "AC478d735f436986f7d2b6487aa9a977da";
        $token  = "7bbe05dc74d98d63ce57bda7ff3e964d";
        $twilio = new Client($sid, $token);

        $this->catalogSession->setPhone($phone);
        $this->catalogSession->setOtp($otp);
//        $phone = $this->catalogSession->getPhone();
//        $test = $this->catalogSession->getOtp();


        $message = $twilio->messages
            ->create("+91".$phone, // to
                array(
                    "from" => "+18158699964",
                    "messagingServiceSid" => "MG04f723e194d7568e19027238e7e18ee1",
                    "body" => "otp is".$otp
                )
            );
        $this->_redirect('login/verify');

//        print($message->sid);
        return $this->resultPageFactory->create();
    }


    public function sendSms(){
//
    }
}

