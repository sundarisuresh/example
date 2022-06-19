<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Controller\Index;

use Exception;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Sundari\Productfaq\Model\PqaFactory;

/**
 *
 */
class Index extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;
    /**
     * @var Session
     */
    protected $customerSession;
    /**
     * @var TimezoneInterface
     */
    protected $date;
    /**
     * @var PqaFactory
     */
    protected $pqa;
    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * Constructor
     * @param Context $context
     * @param Session $customerSession
     * @param TimezoneInterface $date
     * @param PqaFactory $pqa
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        Context           $context,
        Session           $customerSession,
        TimezoneInterface $date,
        PqaFactory        $pqa,
        ManagerInterface  $messageManager,
        RedirectFactory   $resultRedirectFactory
    ) {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->customerSession = $customerSession;
        $this->date = $date;
        $this->pqa = $pqa;
        $this->messageManager = $messageManager;
        return parent::__construct($context);
    }

    /**
     * @return Page|Redirect|ResultInterface
     */
    public function execute()
    {
        $customerid = $this->getCustomerId();
        $date = $this->getDate();
        try {
            $data = $this->getRequest()->getParams();
            $question = $data['question'];
            $productid = $data['productid'];
            if ($data) {
                $pqa = $this->pqa->create();
                $pqa->setData('question', $question);
                $pqa->setData('customerid', $customerid);
                $pqa->setData('productid', $productid);
                $pqa->setData('dateandtime', $date);
                $pqa->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        return $resultRedirect;
    }

    /**
     * @return ResultInterface
     * public function execute()
     */
    public function getCustomerId()
    {
        return $this->customerSession->getCustomer()->getId();
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date->date()->format('Y-m-d H:');
    }
}
