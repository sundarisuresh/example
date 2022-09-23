<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Around\App\Block\Submit;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Index extends Template
{
    /**
     * Constructor
     *
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }
}

