<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Sundari\Contactus\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;

class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var PageFactory
     */
    

    protected $form;
    protected $messageManager;
    protected $resultRedirectFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct( 
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\Message\ManagerInterface $messageManager,
    \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
    \Sundari\Contactus\Model\Form $form)
    {
        $this->messageManager = $messageManager;
        $this->form =$form;
        $this->resultRedirectFactory =$resultRedirectFactory;
        return parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        // return $this->resultPageFactory->create();
      $post=$this->getRequest()->getParams();
      if ($post)
      {
        $this->form->setName($post['name']);
        $this->form->setEmailid($post['emailid']);
        $this->form->setPhone($post['phone']);
        $this->form->setComment($post['comment']);
        $this->messageManager->addsuccessmessage(_("data saved sucessfully."));
      }else
      {
          $this->messageManager->adderrormessage(_("please fill the form again."));
      }
      $resultRedirect = $this->resultRedirectFactory->create();
      $resultRedirect->setPath('contactus');
      return $resultRedirect;

    }

}

