<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\Engrave\Block;

class AdditionalInfo extends \Magento\Checkout\Block\Cart\Additional\Info

{

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
//    public function __construct(
//        \Magento\Framework\View\Element\Template\Context $context,
//        array $data = []
//
//    ) {
//        parent::__construct($context, $data);
//    }


    /**
     * @return string
     */
    public function getItemEngrave()
    {
      return  $this->getItem()->getEngrave();
        //Your block code
    }
}
