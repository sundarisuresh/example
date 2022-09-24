<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Categories;

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

    /**
     * Constructor
     * @param Context $context
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context $context,
        Logo    $logo,

        array   $data = []
    )
    {
        $this->logo = $logo;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }
}


