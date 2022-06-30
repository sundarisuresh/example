<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestionbox\Controller\Index;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Sundari\Suggestionbox\Model\SuggestionFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;
    protected $customerSession;
    protected $date;
    protected $suggestion;
    protected $messageManager;


    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        PageFactory $resultPageFactory,
        Session           $customerSession,
        TimezoneInterface $date,
        SuggestionFactory       $suggestion,
        ManagerInterface  $messageManager,
        RedirectFactory   $resultRedirectFactory,
        \Magento\Framework\App\Action\Context $context
    )
    {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->customerSession = $customerSession;
        $this->date = $date;
        $this->suggestion = $suggestion;
        $this->messageManager = $messageManager;
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
//        echo "dfgh"; exit();
        $customerid = $this->getCustomerId();
        $date = $this->getDate();
        $data = $this->getRequest()->getParams();
        $suggest=$data['suggestion'];
//        print_r($data);
//        exit;
        $suggestion = $this->suggestion->create();
        $suggestion->setData('suggestion', $suggest);
        $suggestion->setData('customerid', $customerid);
        $suggestion->setData('dateandtime', $date);
        $suggestion->save();
        $this->messageManager->addSuccessMessage(__("Thanks for your valuable suggestion"));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        return $resultRedirect;

    }
    public function getCustomerId()
    {
        return $this->customerSession->getCustomer()->getId();
    }
    public function getDate()
    {
        return $this->date->date()->format('Y-m-d H:');
    }
}
