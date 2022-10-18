<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Cart\Block\Success;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;

/**
 *
 */
class Index extends Template
{
    /**`
     * @var Logo
     */
    protected $logo;
    private $checkoutSession;


    /**
     * Constructor
     * @param Context $context
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context $context,
        Logo    $logo,
        \Magento\Checkout\Model\Session $checkoutSession,


        array   $data = []
    )
    {
        $this->logo = $logo;
        $this->checkoutSession = $checkoutSession;;


        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }
    public function getCheckoutSession()
    {
        return $this->checkoutSession;
    }
}

