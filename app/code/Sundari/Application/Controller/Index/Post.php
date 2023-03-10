<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Application\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Sundari\Application\Model\ApplicationFactory;

class Post extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $application;
    protected $resultRedirectFactory;
    protected $messageManager;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                Context                                              $context,
                                ApplicationFactory                                  $application,
                                \Magento\Framework\Message\ManagerInterface          $messageManager,
                                \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->application = $application;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->messageManager = $messageManager;
        return parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        $data = $this->getRequest()->getParams();
        print_r($data);
        $Name = $data['name'];
        $Email = $data['email'];
        $table = $this->application->create();
        $table->setData('name', $Name);
        $table->setData('email', $Email);
        $table->save();
        $this->messageManager->addSuccess(__("your application registered sucessfully"));
        return $resultRedirect;
    }
}

