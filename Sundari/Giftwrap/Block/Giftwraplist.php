<?php

/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Sundari\Giftwrap\Block;

class Giftwraplist extends \Magento\Sales\Block\Order\History
{

    protected $storeManager;
    protected $urlInterface;
    protected $scopeConfig;

    /**
     * @var string
     */
    protected $_template = 'Magento_Sales::order/history.phtml';

    /**
     * @var \Magento\Sales\Model\ResourceModel\Order\CollectionFactory
     */
    protected $_orderCollectionFactory;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;

    /**
     * @var \Magento\Sales\Model\Order\Config
     */
    protected $_orderConfig;

    /**
     * @var \Magento\Sales\Model\ResourceModel\Order\Collection
     */
    protected $orders;

    /**
     * @var CollectionFactoryInterface
     */
    private $orderCollectionFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Sales\Model\Order\Config $orderConfig
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Sales\Model\Order\Config $orderConfig,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\UrlInterface $urlInterface,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,

        array $data = []
    ) {
        $this->_orderCollectionFactory = $orderCollectionFactory;
        $this->_customerSession = $customerSession;
        $this->_orderConfig = $orderConfig;
        $this->storeManager = $storeManager;
        $this->urlInterface = $urlInterface;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $orderCollectionFactory, $customerSession, $orderConfig, $data);
    }
    public function orderlist($order)
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $logo = $this->scopeConfig->getValue('order/items/giftwrap', $storeScope);
        $total = $order->getGrandTotal();
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl();
        if ($total > 100) {
            return $mediaUrl . "media" . '/' . "media" . '/' . $logo;
        }
    }
}
