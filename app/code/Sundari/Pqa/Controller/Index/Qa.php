<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
//use Magento\Framework\View\Result\PageFactory;

class Qa extends \Magento\Framework\App\Action\Action
{
    protected $request;
    protected $customerSession;
    protected $date;
    protected $qa;

    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;

    /**
     * Constructor
     * //     * @param PageFactory $resultPageFactory
     */
    public function __construct (
        Context                                              $context, \Magento\Framework\App\Request\Http $request,
        \Magento\Customer\Model\Session                      $customerSession,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $date,
        \Sundari\Pqa\Model\QaFactory                         $qa,
        \Magento\Framework\Message\ManagerInterface          $messageManager,
        \Magento\Framework\Controller\ResultFactory          $resultRedirectFactory

    )
    {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->request = $request;
        $this->customerSession = $customerSession;
        $this->date = $date;
        $this->qa = $qa;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    public function execute ()
    {
        $qus = $this->request->getParam("question");
        $productid = $this->request->getParam("productid");
        $customerid = $this->getCustomer();
        $date = $this->getDate();
        if($this->getCustomer()) {
            try {
                $qa = $this->qa->create();
                $qa->setData('question', $qus);
                $qa->setData('customerid', $customerid);
                $qa->setData('date', $date);
                $qa->setData('productid', $productid);
                $qa->save();
                $this->messageManager->addSuccess(__("your question has been submitted successfully"));
            } catch (\Exception $e) {
                print_r($e->getMessage());
                exit;
                $this->messageManager->addError(__('please try again. Form Not Submit'));

            }
        }
        else{
            $this->messageManager->addError(__('Please login to post your question'));

        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        return $resultRedirect;
    }

    /**
     * Execute view action
     * @return ResultInterface
     */
    public function getCustomer ()
    {
        return $this->customerSession->getCustomer()->getId();

    }

    public function getDate ()
    {
        return $this->date->date()->format('Y-m-d');
//       print_r($date);

    }
}

