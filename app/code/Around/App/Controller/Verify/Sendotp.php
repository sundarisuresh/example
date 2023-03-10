<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Verify;

use Magento\Catalog\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Twilio\Rest\Client;

class Sendotp extends Action
{
    protected $request;
    protected $catalogSession;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     * @param Context $context
     * @param Http $request
     * @param Session $catalogSession
     */
    public function __construct(PageFactory $resultPageFactory,
                                Context     $context,
                                Http        $request,
                                Session     $catalogSession
    )
    {
        $this->request = $request;
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
        if (!$phone) {
            $phone = $this->catalogSession->getPhone();
        }
        $digits = 4;
        $otp = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $otp = 1234;
        $sid = "AC478d735f436986f7d2b6487aa9a977da";
        $token = "ea859e1dfbb7c29ae56ddf5be11ae01c";
        $twilio = new Client($sid, $token);
        $this->catalogSession->setPhone($phone);
        $this->catalogSession->setOtp($otp);
//        $message = $twilio->messages
//            ->create("+91" . $phone, // to
//                array(
//                    "from" => "+18158699964",
//                    "messagingServiceSid" => "MG04f723e194d7568e19027238e7e18ee1",
////                    "body" => "otp is " . $otp
//                )
//            );
        $this->_redirect('login/verify');
        return $this->resultPageFactory->create();
    }
}

