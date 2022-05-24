<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Quickcart\Controller\Index;

use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $productRepository;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $checkoutSession;
    protected $cartRepository;
    protected $resultRedirectFactory;
    protected $messageManager;

    /**
     * Constructor
     * @param PageFactory $resultPageFactory
     */
    public function __construct (PageFactory                                          $resultPageFactory,
                                 \Magento\Framework\App\Action\Context                $context,
                                 \Magento\Checkout\Model\SessionFactory               $checkoutSession,
                                 \Magento\Quote\Api\CartRepositoryInterface           $cartRepository,
                                 \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
                                 \Magento\Framework\Message\ManagerInterface          $messageManager,
                                 \Magento\Catalog\Model\ProductRepository             $productRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->checkoutSession = $checkoutSession;
        $this->cartRepository = $cartRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->messageManager = $messageManager;
        return parent::__construct($context);
    }

    public function execute ()
    {
        $f='';
        $success ='';
        foreach ($this->getSku() as $item) {
            try {
                $product = $this->getProductBySku($item);
                $qty = 1;
                $session = $this->checkoutSession->create();
                $quote = $session->getQuote();
                $quote->addProduct($product, $qty);
                $this->cartRepository->save($quote);
                $session->replaceQuote($quote)->unsLastRealOrderId();
                $success = $success . $item .  "  added <br>";
            } catch (\Exception $exception) {
                $f = $f . $item . " error ";
            }
        }
        if ($success) {
            $this->messageManager->addSuccess(__($success));
        }
        if ($f) {
            $this->messageManager->addError(__($f));

        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('checkout/cart');
        return $resultRedirect;

    }

    /**
     * Execute view action
     * @return ResultInterface
     */
    public function getSku ()
    {
        $data = $this->getRequest()->getParams();
        $sku = $data['sku'];

        return $sku = explode(",", $sku);
//        print_r($sku);
//        return $this->resultPageFactory->create();
    }

    public function getProductBySku ($sku)
    {
        return $this->productRepository->get($sku);
    }

}

