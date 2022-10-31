<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Block\Trackorder;
use Magento\Theme\Block\Html\Header\Logo;
use Magento\Customer\Model\Session;
use Magento\Catalog\Helper\Image;
use Exception;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;






class Index extends \Magento\Framework\View\Element\Template
{    protected $logo;
    protected $request;
    protected $customerSession;
    protected $orderRepository;
    protected $image;
    protected $productRepository;
    protected $scopeConfig;
    protected $timezoneInterface;










    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        TimezoneInterface $timezoneInterface,
        Session                    $customerSession,
        Logo                       $logo,
        Image $image,
        ScopeConfigInterface           $scopeConfig,



        array $data = []
    ) {
        $this->logo = $logo;
        $this->request = $request;
        $this->customerSession = $customerSession;
        $this->orderRepository = $orderRepository;
        $this->image= $image;
        $this->productRepository = $productRepository;
        $this->scopeConfig = $scopeConfig;
        $this->timezoneInterface = $timezoneInterface;






        parent::__construct($context, $data);
    }
    public function getLogoSrc(): string
    {
        return $this->logo->getLogoSrc();
    }
    public function getCustomer()
    {
        $customer = $this->customerSession->getCustomer();
        return $customer;
    }

    public function getOrder()
    {
        $orderId=$this->request->getParam('orderid');
        $order = $this->orderRepository->get($orderId);
        return $order;

    }
    public function getShop(){
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $shopname = $this->scopeConfig->getValue('location/general/shopname',$storeScope );
        $street = $this->scopeConfig->getValue('location/general/street',$storeScope );
        $city = $this->scopeConfig->getValue('location/general/city',$storeScope );
//        echo $time; exit();
        return $shopname .','. $street .',' . $city ;
    }
    public function getcomplete(){
        $order = $this->getOrder();
        $completedtime = $order->getCompletedTime();
        $ordertime = $order->getCreatedAt();
        $from_time = strtotime($completedtime);
        $to_time = strtotime($ordertime);
        $diff_minutes = round(abs($from_time - $to_time) / 60,2). " minutes";
//        $deliverytime= (int)$completedtime-(int)$ordertime;


      echo $diff_minutes;
      
    }
    public function getDeliveryTime(){
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $time = $this->scopeConfig->getValue('location/general/delivery',$storeScope );
        $order = $this->getOrder();
        $ordertime = $order->getCreatedAt();
        $currenttime = date('Y-m-d H:i:s');
//            $this->timezoneInterface->date()->format('Y-m-d H:i:s');

//        echo $ordertime;
//        echo $currenttime;
//        exit;
        $from_time = strtotime($currenttime);
        $to_time = strtotime($ordertime);
        $diff_minutes = round(abs($from_time - $to_time) / 60,2). " minutes";
        $deliverytime= (int)$time-(int)$diff_minutes;
//        echo $deliverytime;
//        echo date('Y-m-d H:i:s');
 return $deliverytime= (int)$time-(int)$diff_minutes;



    }
    public function getImage($item)
    {
//        print_r($product->getData()); exit();
//        print_r($product->getData('small_image')); exit();
$productid=$item->getProductId();
$product=$this->productRepository->getById($productid);

        $imageUrl = $this->image->init($product, 'product_page_image_small')
            ->setImageFile($product->getSmallImage()) // image,small_image,thumbnail
            ->resize(380)
            ->getUrl();
        return $imageUrl;

    }
}

