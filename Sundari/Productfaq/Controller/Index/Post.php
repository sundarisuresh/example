<?php

/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Sundari\Productfaq\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use \Magento\Framework\Message\ManagerInterface;

class Post extends \Magento\Framework\App\Action\Action
{
    protected $messageManager;
    protected $customerSession;
    protected $date;


    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;
    protected $faq;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        RedirectFactory $resultRedirectFactory,
        \Sundari\Productfaq\Model\FaqFactory $faq,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Stdlib\DateTime\DateTime $date

    ) {

        $this->_messageManager = $messageManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->faq = $faq;
        $this->customerSession = $customerSession;
        $this->date = $date;

        parent::__construct($context);
        // parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function getCustomer()
    {
        // echo"nbv";

        //Your block code
        $customer = $this->customerSession->getCustomer()->getId();
        return $customer;
        // exit;
    }

    public function execute()

    {
        $data = $this->getRequest()->getParams();
        if ($data) {
            try {
                // print_r($data);
                $customerid = $this->getCustomer();
                $date = $this->date->gmtDate();
                // print_r($customerid.'ttt'.$date);
                // exit;
                $faq = $this->faq->create();
                // $faq->setData($data);
                $faq->setData('question', $data['question']);
                $faq->setData('customerid', $customerid);
                $faq->setData('dateandtime', $date);
                $faq->setData('productid', $data['productid']);

                $faq->save();
                $this->_messageManager->addSuccess(__("Submitted"));
                //code...
            } catch (\Exception $e) {
                // $e->getMessage();
                // print_r($e->getMessage());
                // exit;
                $this->messageManager->addError(__('please try again. Form Not Submit'));

                //throw $th;
            }

            // print_r($data);

        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        return $resultRedirect;
    }
}
