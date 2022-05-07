<?php

/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Sundari\Giftwrap\Block;

class Giftwrap extends \Magento\Framework\View\Element\Template

{
    protected $request;
    protected $order;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Sales\Model\OrderRepository $order,

        array $data = []
    ) {
        $this->request = $request;
        $this->order = $order;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function isGiftwrap()
    {
        // Your block code
        $orderid = $this->request->getParam('order_id');
        // echo $orderid;
        $orderinfo = $this->order->get($orderid);
        $total =  $orderinfo->getGrandTotal();
        $data = $orderinfo->getGiftwrap();
        
        // echo $total;
        if ($data ==1) {
            return true;
        }
        return false;
    }
}
