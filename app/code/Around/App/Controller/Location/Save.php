<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Around\App\Controller\Location;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Save extends Action
{
    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        echo "xsa"; exit();
        return $this->resultPageFactory->create();
    }
}

