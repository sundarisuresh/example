<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Around\App\Block\Location;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Magento\Framework\Data\Form\FormKey;

/**
 *
 */
class Index extends Template
{
    /**
     * @var Logo
     */
    protected $logo;

    protected $formKey;
    private $customerSession;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context $context,
        Logo $logo,
        FormKey $formKey,
        Session                    $customerSession,
        array $data = []
    )
    {
        $this->logo = $logo;
        $this->formKey = $formKey;
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }

    public function getCustomerName()
    {
        $customerName= $this->customerSession->getCustomer()->getFirstname();
        if($customerName == "Dummy"){
            return false;
        }
        return true;
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}

