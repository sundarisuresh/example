<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\FacebookShare\Block;

use Magento\Framework\Serialize\Serializer\Json;

class Facebook extends \Magento\Theme\Block\Html\Breadcrumbs
{
    protected $_coreRegistry;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Registry $_coreRegistry,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        Json $serializer = null
    ) {$this->_coreRegistry=$_coreRegistry;
        parent::__construct($context, $data,$serializer);
    }

    /**
     * @return string
     */
    public function getProductUrl()
    {
       return $this->_coreRegistry->registry('product')->getProductUrl();
    }
}

