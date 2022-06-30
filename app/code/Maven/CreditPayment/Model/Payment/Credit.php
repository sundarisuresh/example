<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Maven\CreditPayment\Model\Payment;

use Magento\Directory\Helper\Data as DirectoryHelper;

class Credit extends \Magento\Payment\Model\Method\AbstractMethod
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    private $customerSession;
    private $customerRepositoryInterface;
    private $cart;

    public function __construct(
        \Magento\Framework\Model\Context                        $context,
        \Magento\Framework\Registry                             $registry,
        \Magento\Framework\Api\ExtensionAttributesFactory       $extensionFactory,
        \Magento\Framework\Api\AttributeValueFactory            $customAttributeFactory,
        \Magento\Payment\Helper\Data                            $paymentData,
        \Magento\Framework\App\Config\ScopeConfigInterface      $scopeConfig,
        \Magento\Payment\Model\Method\Logger                    $logger,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb           $resourceCollection = null,
        array                                                   $data = [],
        DirectoryHelper                                         $directory = null,
        \Magento\Customer\Model\Session                         $customerSession,
        \Magento\Customer\Api\CustomerRepositoryInterface       $customerRepositoryInterface,
        \Magento\Checkout\Model\Cart $cart
    )
    {
        parent::__construct(
            $context,
            $registry,
            $extensionFactory,
            $customAttributeFactory,
            $paymentData,
            $scopeConfig,
            $logger,
            $resource,
            $resourceCollection,
            $data,
            $directory
        );
        $this->customerSession = $customerSession;
        $this->customerRepositoryInterface = $customerRepositoryInterface;
        $this->cart=$cart;

    }

    protected $_code = "credit";
    protected $_isOffline = true;

    public function isAvailable(
        \Magento\Quote\Api\Data\CartInterface $quote = null
    )
    {
        $customer = $this->customerSession->getCustomer();
        if (!$customer->getId()) {
            return false;
        }
        $customer = $this->customerRepositoryInterface->getById($customer->getId());
        if (!$customer->getCustomAttribute('creditbalance')) {
            return false;
        }
        $grandTotal = $this->cart->getQuote()->getGrandTotal();

        if ($customer->getCustomAttribute('creditbalance')->getValue() < $grandTotal) {
            return false;
        }
        return parent::isAvailable($quote);
    }
}

