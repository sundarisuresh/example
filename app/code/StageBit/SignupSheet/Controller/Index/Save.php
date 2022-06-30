<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace StageBit\SignupSheet\Controller\Index;

use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use StageBit\SignupSheet\Model\SignupSheetRepository;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $request;
    protected $resultRedirectFactory;
    protected $messageManager;
    protected $signupSheetRepository;
    protected $signupSheetInterface;


    /**
     * @var PageFactory
     */

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Request\Http $request
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param \Magento\Framework\Controller\ResultFactory $resultRedirectFactory
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Request\Http         $request,
        \Magento\Framework\Message\ManagerInterface          $messageManager,
        \Magento\Framework\Controller\ResultFactory $resultRedirectFactory,
        \StageBit\SignupSheet\Model\SignupSheetRepository $signupSheetRepository,
        \Magento\Framework\App\Action\Context       $context,
        \StageBit\SignupSheet\Api\Data\SignupSheetInterface $signupSheetInterface
    )
    {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->request = $request;
        $this->messageManager = $messageManager;
        $this->signupSheetRepository=$signupSheetRepository;
        $this->signupSheetInterface=$signupSheetInterface;

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
        $date = $this->request->getParam("date");
        try {
            $this->signupSheetInterface->setDate($date);
            $this->signupSheetInterface->setName($name);
            $this->signupSheetRepository->save($this->signupSheetInterface);
            $this->messageManager->addSuccess(__("Form submitted successfully"));
        }catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        return $resultRedirect;
    }
}


