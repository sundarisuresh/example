<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Location;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    public function __construct(PageFactory $resultPageFactory,
                                \Magento\Framework\App\Action\Context       $context,

                                \Magento\Framework\App\Request\Http         $request,
                                \Magento\Catalog\Model\Session $catalogSession
    )
    {        $this->request = $request;

        $this->resultPageFactory = $resultPageFactory;
        $this->catalogSession = $catalogSession;

        parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSession = $objectManager->get('Magento\Customer\Model\Session');
        if(!$customerSession->isLoggedIn()) {
            $this->_redirect('login/');
        }
        
        return $this->resultPageFactory->create();

    }
}

