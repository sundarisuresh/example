<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Salesdeal\Block;

class Sales extends \Magento\Framework\View\Element\Template
{        protected $registry;


    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
                \Magento\Framework\Registry $registry,

        array $data = []
    ) {        $this->registry = $registry;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }
    public function getAttribute()
    {
        $attribute=$this->getCurrentProduct()->getData('time');
        if(!$attribute)
        {
            return false;
        }
        $date=date_create($attribute);
        $output= date_format($date,"F d, Y H:i:s");
//        exit;
        return $output;
    }
    public function getTime()
    {
        //Your block code
        return __('Hello Developer! This how to get the storename: %1 and this is the way to build a url: %2', $this->_storeManager->getStore()->getName(), $this->getUrl('contacts'));
    }
}

