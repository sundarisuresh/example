<?php

/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Sundari\Giftwrap\Block;

class Giftwrap extends \Magento\Framework\View\Element\Template
{
    protected $orderRepository;
    protected $request;
    protected $storeManager;
    protected $urlInterface;
    protected $scopeConfig;





    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\UrlInterface $urlInterface,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,




        array $data = []
    ) {
        $this->orderRepository = $orderRepository;
        $this->request = $request;
        $this->storeManager = $storeManager;
        $this->urlInterface = $urlInterface;
        $this->scopeConfig = $scopeConfig;






        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    //     public function getStoreManagerData()
    //     {

    //      $this->storeManager->getStore()->getBaseUrl();
    //     }
    //     public function getUrlInterfaceData()
    // {
    //     $this->urlInterface->getBaseUrl();
    // }

    public function getLogo()
    {
        //Your block code
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $logo = $this->scopeConfig->getValue('order/items/giftwrap', $storeScope);
        $orderId = $this->request->getParam('order_id');
        $order = $this->orderRepository->get($orderId);
        $total = $order->getGrandTotal();
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl();
        if ($total > 100) {
            return $mediaUrl . "media" . '/' . "media" . '/' . $logo;
        }
    }
}
