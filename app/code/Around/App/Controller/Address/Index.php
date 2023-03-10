<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Address;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultInterface;
use  Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\Action\Context;


class Index extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;
    protected $request;
    protected $customerSession;



    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
                                RedirectFactory $resultRedirectFactory,
                                \Magento\Customer\Model\Session $customerSession,
                                Context $context,
                                Http $request)
    {  parent::__construct($context);
        $this->request = $request;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->customerSession = $customerSession;




//        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {  $adressid= $this->request->getParam("adressid");
        $customer=$this->customerSession->getCustomer();
        $customer->setDefaultDeliveryAdd($adressid);
        $customer->save();

//        $customerData = $customer->getDataModel();
//        $customerData->setCustomAttribute('default_delivery_add',$adressid);
//        $customer->updateData($customerData);
//echo $adressid;

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('/');
        return $resultRedirect;
    }
}


