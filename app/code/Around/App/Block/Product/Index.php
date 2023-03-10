<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Product;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\Productvideo\Model\ProductvideoFactory;

/**
 *
 */
class Index extends Template
{
    /**`
     * @var Logo
     */
    protected $logo;
    protected $productvideo;

    /**
     * Constructor
     * @param Context $context
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context $context,
        Logo    $logo,
        ProductvideoFactory $productvideo,

        array   $data = []
    )
    {
        $this->logo = $logo;
        $this->productvideo =$productvideo;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getProductVideo()
    {
        $productvideo= $this->productvideo->create()->getCollection();
        $productvideo->setOrder('sortorder','ASC');
        return $productvideo;

    }
}

