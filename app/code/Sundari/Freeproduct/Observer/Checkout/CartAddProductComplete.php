<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Freeproduct\Observer\Checkout;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Event\Observer;

class CartAddProductComplete implements \Magento\Framework\Event\ObserverInterface
{
    protected $checkoutSession;
    protected $formKey;
    protected $cart;
    protected $productFactory;
    protected $productRepository;


    /**
     * Execute observer
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function __construct(
        \Magento\Checkout\Model\Session       $checkoutSession,
        \Magento\Framework\Data\Form\FormKey  $formKey,
        \Magento\Checkout\Model\Cart          $cart,
        ProductRepositoryInterface            $productRepository,
        \Magento\Catalog\Model\ProductFactory $productFactory
    )
    {
        $this->checkoutSession = $checkoutSession;
        $this->formKey = $formKey;
        $this->cart = $cart;
        $this->productRepository = $productRepository;
        $this->productFactory = $productFactory;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $request = $observer->getEvent()->getRequest()->getParams();

        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('text message' . print_r($request, true));
        $sku = $product->getfreeproduct();
        if ($sku) {
            $free_product = $this->productRepository->get($sku);
            $id = $free_product->getId();
            $quoteItems = $this->checkoutSession->getQuote()->getAllVisibleItems();
//            foreach ($quoteItems as $item) {
//                if ($product->getId()==$item->getProductId()) {
//                    $quantity= $item->getQty();
//                }
//            }
            $free_product = $this->productFactory->create()->load($id);
            if (isset($request['qty'])) {
                $qty = $request['qty'];
            } else {
                $qty = 1;
            }
            $params = [
                'form_key' => $this->formKey->getFormKey(),
                'product_id' => $id, //product Id

                'qty' => $qty, //quantity of product
            ];

            $this->cart->addProduct($free_product, $params);
            $productItem = $this->getProductQuote($free_product);
            $productItem->setCustomPrice(0); //Set Custom Price
            $productItem->setOriginalCustomPrice(0); //Set Custom Price
            $productItem->getProduct()->setIsSuperMode(true); //Enable super mode on the product.
            $this->cart->save();
        }
//        $quoteItems = $this->checkoutSession->getQuote()->getAllVisibleItems();
//        foreach ($quoteItems as $item) {
//            $product = $item->getProduct();
//            $sku = $product->getfreeproduct();
//            if ($sku) {
//                $free_product = $this->productRepository->get($sku);
//                $id = $free_product->getId();
//
////                $free_product = $this->productFactory->create()->load($id);
//                $params = [
//                    'form_key' => $this->formKey->getFormKey(),
//                    'product_id' => $id, //product Id
//                    'qty' => 1, //quantity of product
//                ];
//
//                $this->cart->addProduct($free_product, $params);
//                $productItem = $this->getProductQuote($free_product);
//                $productItem->setCustomPrice(0); //Set Custom Price
//                $productItem->setOriginalCustomPrice(0); //Set Custom Price
//                $productItem->getProduct()->setIsSuperMode(true); //Enable super mode on the product.
//                $this->cart->save();
//            }
//        }
    }

    //foreach ($quoteItems as $item) {
//    $productId = $item->getProductId();
//    $free_product = $this->productFactory->create()->load(1);

    public function getProductQuote($product)
    {
        $quote = $this->checkoutSession->getQuote();
        $cartItems = $quote->getItemByProduct($product);
        return $cartItems;
    }
}
