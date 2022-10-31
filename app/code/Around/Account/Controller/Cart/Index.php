<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Controller\Cart;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    protected $request;
    protected $orderRepository;
    protected $productRepository;
    protected $formKey;
    protected $cart;
    protected $product;




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
                                \Magento\Catalog\Model\ProductRepository $productRepository,
                                \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
                                \Magento\Framework\Data\Form\FormKey $formKey,
                                \Magento\Checkout\Model\Cart $cart,
                                \Magento\Catalog\Model\Product $product,
                                \Magento\Framework\App\Request\Http $request
)
    {
        $this->request = $request;
        $this->resultPageFactory = $resultPageFactory;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->formKey = $formKey;
        $this->cart = $cart;
        $this->product = $product;


    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
       $orderId= $this->request->getParam('orderid');
        $order = $this->orderRepository->get($orderId);
        $items= $order->getAllItems();
        foreach($items as $item)
        {
//            echo "<pre>";
            $options=$item->getData('product_options');
            $qty=$options['info_buyRequest']['qty'];
//            exit;
            $productId= $item->getProductId();
            $product=$this->productRepository->getById($productId);
            $params = array(
                'form_key' => $this->formKey->getFormKey(),
                'product' => $productId, //product Id
                'qty'   =>$qty//quantity of product
            );
            $this->cart->addProduct($product, $params);
            $this->cart->save();

        }


        return $this->resultPageFactory->create();
    }
}

