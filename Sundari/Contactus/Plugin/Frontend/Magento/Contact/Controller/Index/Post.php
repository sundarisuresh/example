<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Contactus\Plugin\Frontend\Magento\Contact\Controller\Index;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Contact\Model\ConfigInterface;
use Magento\Contact\Model\MailInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\DataObject;
class Post
{       /**
    * @var DataPersistorInterface
    */
   private $dataPersistor;

   /**
    * @var Context
    */
   private $context;

   /**
    * @var MailInterface
    */
   private $mail;

   /**
    * @var LoggerInterface
    */
   private $logger;
   private $messageManager;
   private $resultRedirectFactory;

   /**
    * @param Context $context
    * @param ConfigInterface $contactsConfig
    * @param MailInterface $mail
    * @param DataPersistorInterface $dataPersistor
    * @param LoggerInterface $logger
    */
   public function __construct(
       Context $context,
       ConfigInterface $contactsConfig,
       MailInterface $mail,
       DataPersistorInterface $dataPersistor,
       \Magento\Framework\Message\ManagerInterface $messageManager,
       \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,


       LoggerInterface $logger = null
   ) {
       
       $this->context = $context;
       $this->mail = $mail;
       $this->dataPersistor = $dataPersistor;
       $this->logger = $logger ?: ObjectManager::getInstance()->get(LoggerInterface::class);
       $this->messageManager = $messageManager;
       $this->resultRedirectFactory = $resultRedirectFactory;


   }


    public function aroundExecute(
        \Magento\Contact\Controller\Index\Post $subject,
        \Closure $proceed
    ) {
        if (!$subject->getRequest()->isPost()) {
            return $subject->resultRedirectFactory->create()->setPath('*/*/');
        }
        try {
            // $this->sendEmail($this->validatedParams());
            $this->messageManager->addSuccessMessage(
                __('sucess')
            );
            $this->dataPersistor->clear('contact_us');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('contact_us', $subject->getRequest()->getParams());
        } catch (\Exception $e) {
            $this->logger->critical($e);
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
            $this->dataPersistor->set('contact_us', $subject->getRequest()->getParams());
        }
        return $this->resultRedirectFactory->create()->setPath('contact/index');
        //Your plugin code
        $result = $proceed();
        return $result;
    }
}

