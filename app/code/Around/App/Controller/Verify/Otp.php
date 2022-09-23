<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Verify;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\PageFactory;
use Magento\Store\Model\StoreManagerInterface;


class Otp extends Action
{
    protected $request;
    protected $storeManager;
    protected $customerFactory;


    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $catalogSession;
    protected $session;
    private $customerRepository;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory                    $resultPageFactory,
                                Context                        $context,
                                \Magento\Catalog\Model\Session $catalogSession,
                                Http                           $request,
                                StoreManagerInterface          $storeManager,
                                CustomerFactory                $customerFactory,
                                CustomerRepositoryInterface    $customerRepository,
                                Session                        $session


    )
    {
        $this->request = $request;
        $this->catalogSession = $catalogSession;
        $this->customerRepository = $customerRepository;
        $this->storeManager = $storeManager;
        $this->customerFactory = $customerFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->session = $session;
        parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $otp = $this->request->getParam("otp");

        $phone = $this->catalogSession->getPhone();
        $email = $phone . "@gmail.com";
        $test = $this->catalogSession->getOtp();
        if ($otp == $test) {
//            echo "logged in";
            try {
                $customerData = $this->customerRepository->get($email);
                $customerId = (int)$customerData->getId();
//                echo "You are already signed up";
                $customer = $this->customerFactory->create();
                $websiteId = $this->storeManager->getWebsite()->getWebsiteId();
                $loadCustomer = $customer->setWebsiteId($websiteId)->loadByEmail($email);
                $this->session->setCustomerAsLoggedIn($loadCustomer);

                $this->_redirect('login/location');

            } catch (NoSuchEntityException $noSuchEntityException) {
                $websiteId = $this->storeManager->getWebsite()->getWebsiteId();
                $customer = $this->customerFactory->create();
                $customer->setWebsiteId($websiteId);
                $customer->setEmail($email);
                $customer->setFirstname("Dummy");
                $customer->setLastname("Dummy");
                $customer->setPassword("password");
                $customer->setPhoneNumber($phone);
                $customer->save();
                $customer = $this->customerFactory->create();
                $loadCustomer = $customer->setWebsiteId($websiteId)->loadByEmail($email);
                $this->session->setCustomerAsLoggedIn($loadCustomer);
                $this->_redirect('login/location');

            }


        } else {
            $this->catalogSession->setOtpError(true);
            $this->_redirect('login/verify/');
        }

        return $this->resultPageFactory->create();
    }


    public function sendSms()
    {
//
    }
}

