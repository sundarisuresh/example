<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\ProductRegistration\Controller\ProductRegistration;

use Exception;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;
use Training\ProductRegistration\Api\Data\ProductRegistrationInterface;
use Training\ProductRegistration\Controller\ProductRegistration\PageFactory;
use Training\ProductRegistration\Model\ProductRegistrationRepository;

/**
 *
 */
class Post extends Action
{
    /**
     * @var Http
     */
    protected $request;
    /**
     * @var ManagerInterface
     */
    protected $messageManager;
    /**
     * @var ProductRegistrationRepository
     */
    protected $ProductRegistrationRepository;
    /**
     * @var ProductRegistrationInterface
     */
    protected $ProductRegistrationInterface;
    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(ProductRegistrationInterface  $ProductRegistrationInterface,
                                Http                          $request,
                                ManagerInterface              $messageManager,
                                ResultFactory                 $resultRedirectFactory,
                                ProductRegistrationRepository $ProductRegistrationRepository,
                                Context                       $context)
    {
        $this->request = $request;
        $this->ProductRegistrationRepository = $ProductRegistrationRepository;
        $this->messageManager = $messageManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->ProductRegistrationInterface = $ProductRegistrationInterface;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $name = $this->request->getParam("name");
        $dop = $this->request->getParam("dop");
        $sku = $this->request->getParam("sku");
        $contactno = $this->request->getParam("contactno");
        $vendor = $this->request->getParam("vendor");
        $email = $this->request->getParam("email");
        $address = $this->request->getParam("address");
        try {
            $this->ProductRegistrationInterface->setDop($dop);
            $this->ProductRegistrationInterface->setName($name);
            $this->ProductRegistrationInterface->setSku($sku);
            $this->ProductRegistrationInterface->setContactno($contactno);
            $this->ProductRegistrationInterface->setVendor($vendor);
            $this->ProductRegistrationInterface->setEmail($email);
            $this->ProductRegistrationInterface->setAddress($address);
            $this->ProductRegistrationRepository->save($this->ProductRegistrationInterface);
            $this->messageManager->addSuccess(__("Form submitted successfully"));
        } catch (Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        return $resultRedirect;
    }
}
