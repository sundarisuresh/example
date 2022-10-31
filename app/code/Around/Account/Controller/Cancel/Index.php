<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Controller\Cancel;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    protected $request;
    protected $orderManagement;
    protected $resultRedirectFactory;
    protected $messageManager;


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
                                \Magento\Framework\App\Request\Http $request,
                                \Magento\Sales\Api\OrderManagementInterface $orderManagement,
                                \Magento\Framework\Message\ManagerInterface          $messageManager,
                                \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory

)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->request = $request;
        $this->orderManagement = $orderManagement;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->messageManager = $messageManager;

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        $orderId=$this->request->getParam('orderid');
        if($orderId) {
            $this->orderManagement->cancel($orderId);
            $this->messageManager->addSuccess(__("your order canceled sucessfully"));
            return $resultRedirect;
        }else{
            $this->messageManager->addError(__("try again later"));
            return $resultRedirect;
        }

//        return $this->resultPageFactory->create();
    }
}

