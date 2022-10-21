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
class Shipped extends \Magento\Backend\App\Action
{

    /**
     * @var PageFactory
     */
    protected $request;
    protected $orderRepository;
    protected $resultRedirectFactory;
    protected $resultFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(\Magento\Backend\App\Action\Context $context,
                                \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
                                \Magento\Framework\App\Request\Http $request)
    {
        $this->request = $request;
        $this->orderRepository = $orderRepository;
        parent::__construct($context);
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
        if ($order->getState() == 'processing') {
            $order->setState('processing')->setStatus('shipped');
            $order->save();        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('sales/order/view', ['order_id' => $order->getId()]);
        return $resultRedirect;
    }
}

