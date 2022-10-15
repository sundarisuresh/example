<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Controller\Logout;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Controller\Result\RedirectFactory;


class Index implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;
    protected $customerSession;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
                                \Magento\Framework\App\Action\Context $context,
                                RedirectFactory $resultRedirectFactory,
                                \Magento\Customer\Model\Session $customerSession)
    {
        $this->redirect = $context->getRedirect();
        $this->customerSession = $customerSession;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $customerId = $this->customerSession->getId();
        if($customerId) {
            $this->customerSession->logout()
                ->setBeforeAuthUrl($this->redirect->getRefererUrl())
                ->setLastCustomerId($customerId);
//            return "Customer logout successfully";
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('login');
        return $resultRedirect;
    }
}

