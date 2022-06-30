<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Rewards\Block\Checkout;


class Success extends \Magento\Framework\View\Element\Template
{
    protected $customerSession;

    /**
     * Constructor
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session                  $customerSession,
        array                                            $data = []
    )
    {
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }


    public function getCustomer()
    {
        $customer = $this->customerSession->getCustomer();
        return $customer->getData('reward');
    }
}
