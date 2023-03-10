<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Controller\Cancel;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $request;
    protected $orderManagement;
    protected $resultRedirectFactory;
    protected $messageManager;
    protected $orderRepository;



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
                                Context $context,
                                \Magento\Framework\App\Request\Http $request,
                                \Magento\Sales\Api\OrderManagementInterface $orderManagement,
                                \Magento\Framework\Message\ManagerInterface          $messageManager,
                                \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
                                \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory

)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->request = $request;
        $this->orderRepository = $orderRepository;
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
       $review= $this->request->getParam('w3review');
       if($review){
           $order = $this->orderRepository->get($orderId);
           $order->addCommentToStatusHistory($review);
           $this->orderRepository->save($order);

       }
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

