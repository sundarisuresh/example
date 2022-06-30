<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Registration\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Sundari\Registration\Model\RegistrationFactory;

class Post extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $registration;
    protected $resultRedirectFactory;
    protected $messageManager;

    /**
     * Constructor
     * @param PageFactory $resultPageFactory
     * @param Context $context
     * @param RegistrationFactory $registration
     */
    public function __construct(
        PageFactory                                          $resultPageFactory,
        Context                                              $context,
        RegistrationFactory                                  $registration,
        \Magento\Framework\Message\ManagerInterface          $messageManager,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory


    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->registration = $registration;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->messageManager = $messageManager;
        return parent::__construct($context);
    }

    /**
     * Execute view action
     * @return ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        $data = $this->getRequest()->getParams();
//        echo "<pre>";
//        print_r($data);
//        exit;
        $sno = $data['sno'];
        $dop = $data['dop'];
        $vendor = $data['vendor'];
        $Name = $data['Name'];
        $Email = $data['Email'];
        $Address = $data['Address'];

        $collection = $this->registration->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('productserialno', $sno)->load();
        if ($collection->count() > 0) {
            $this->messageManager->addError(__("you already reistered your product"));
            return $resultRedirect;

        }
        $table = $this->registration->create();
        $table->setData('dateofpurchase', $dop);
        $table->setData('name', $Name);
        $table->setData('emailid', $Email);
        $table->setData('vendorname', $vendor);
        $table->setData('address', $Address);
        $table->setData('productserialno', $sno);
        $table->save();
        $this->messageManager->addSuccess(__("your product registered sucessfully"));


        return $resultRedirect;
    }
}
