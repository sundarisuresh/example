<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Controller\Index;

use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;

class Post extends \Magento\Framework\App\Action\Action
{
    protected $request;
    protected $customerSession;
    protected $resultRedirectFactory;




    /**
     * @var PageFactory
     */

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
                                \Magento\Customer\Model\Session $customerSession,
                                RedirectFactory $resultRedirectFactory,
                                \Magento\Framework\App\Request\Http         $request,
                                \Magento\Framework\App\Action\Context $context)
    {
        parent::__construct($context);
        $this->request = $request;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->customerSession = $customerSession;

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $firstname=$this->getRequest()->getParam('firstname');
        $lastname=$this->getRequest()->getParam('lastname');
        $phonenumber=$this->getRequest()->getParam('phonenumber');
        $customer=$this->customerSession->getCustomer();
        $customer->setFirstname($firstname);
        $customer->setLastname($lastname);
        $customer->setPhoneNumber($phonenumber);
        $customer->save();
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('account');
        return $resultRedirect;
    }
}

