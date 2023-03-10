<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Verify;

use Magento\Catalog\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $request;
    protected $catalogSession;


    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                Context     $context,

                                Http        $request,
                                Session     $catalogSession
    )
    {
        $this->request = $request;

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
        $phone = $this->catalogSession->getPhone();
        $test = $this->catalogSession->getOtp();
        if (!$phone || !$test) {
            $this->_redirect('login/');
        }
        $objectManager = ObjectManager::getInstance();
        $customerSession = $objectManager->get('Magento\Customer\Model\Session');
        if ($customerSession->isLoggedIn()) {
            $this->_redirect('login/validate');
        }
        return $this->resultPageFactory->create();
    }


    public function sendSms()
    {
//
    }
}

