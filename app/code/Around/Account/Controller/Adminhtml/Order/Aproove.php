<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Controller\Adminhtml\Order;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultFactory;


class Aproove implements HttpGetActionInterface
{
    protected $request;
    protected $orderRepository;


    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                RedirectFactory $resultRedirectFactory,
                                \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
                                \Magento\Framework\App\Request\Http $request

    )
    {
        $this->request = $request;
        $this->orderRepository = $orderRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $orderId= $this->request->getParam('order_id');
        $order = $this->orderRepository->get($orderId);
        if ($order->getState() == 'pending') {
            $order->setState('processing')->setStatus('approved');
            $order->save();        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
}

