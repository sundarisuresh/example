<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Location;

class Index extends \Magento\Framework\View\Element\Template
{    protected $logo;


    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Theme\Block\Html\Header\Logo $logo,

        array $data = []
    ) {$this->logo = $logo;
        parent::__construct($context, $data);
    }
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }
}

