<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Block\Index;
use Magento\Theme\Block\Html\Header\Logo;
use Magento\Customer\Model\Session;


class Index extends \Magento\Framework\View\Element\Template
{    protected $logo;
    protected $customerSession;



    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Session                    $customerSession,

        Logo                       $logo,

        array $data = []
    ) {
        $this->logo = $logo;
        $this->customerSession = $customerSession;


        parent::__construct($context, $data);
    }
    public function getLogoSrc(): string
    {
        return $this->logo->getLogoSrc();
    }
    public function getCustomer()
    {
        $customer= $this->customerSession->getCustomer();
        return $customer;
    }
}

