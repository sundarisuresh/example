<?php

namespace Sundari\Rewards\Model\Total\Quote;

class Reward extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
    /**
     * @var \Magento\Framework\Pricing\PriceCurrencyInterface
     */
    protected $priceCurrency;
    protected $customerSession;

    /**
     * Custom constructor.
     * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Magento\Customer\Model\Session                   $customerSession
    ) {
        $this->priceCurrency = $priceCurrency;
        $this->customerSession = $customerSession;
    }

    public function getCustomerRewards()
    {
        $customer = $this->customerSession->getCustomer();
        return $customer->getData('reward');
    }

    public function collect(
        \Magento\Quote\Model\Quote                          $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total            $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);
        $baseDiscount = $this->getCustomerRewards();
        $discount = $this->priceCurrency->convert($baseDiscount);
        $total->addTotalAmount('rewards', -$discount);
        $total->addBaseTotalAmount('rewards', -$baseDiscount);
        $total->setBaseGrandTotal($total->getBaseGrandTotal() - $baseDiscount);
        $quote->setRewards(-$discount);
        return $this;
    }
}
