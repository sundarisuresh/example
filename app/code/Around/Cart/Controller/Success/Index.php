<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Cart\Controller\Success;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    private $checkoutSession;
    protected $resultRedirectFactory;



    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
                                \Magento\Checkout\Model\Session $checkoutSession
)
    {
        $this->checkoutSession = $checkoutSession;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */



    public function execute()
    {
        if (!$this->checkoutSession->getOrderId())
        {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('/');
            return $resultRedirect;

        }

        return $this->resultPageFactory->create();
    }
}

