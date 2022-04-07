<?php
namespace Training\Example\Controller\Post;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Index extends \Magento\Framework\App\Action\Action 
{
	protected $_pageFactory;

	protected $messageManager;

	protected $form;


	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\Message\ManagerInterface $messageManager,
		\Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
         \Training\Example\Model\Form $form
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->form = $form;
		$this->messageManager = $messageManager;
		$this->resultRedirectFactory = $resultRedirectFactory;
		return parent::__construct($context);
	}


	// this is controller
	public function execute()
	{
		$data = $this->getRequest()->getParams();
		// print_r($data['name']);
		if (!$data['name'] || !$data['email'] || !$data['telephone'] || !$data['comment'])	
			{
			$this->messageManager->addError(__("fill the form again"));

		
			$resultRedirect = $this->resultRedirectFactory->create();
				$resultRedirect->setPath('example/index/index');
				return $resultRedirect;
		}


			$this->form->setName($data['name']);
$this->form->setEmail($data['email']);
$this->form->setTelephone($data['telephone']);
$this->form->setComment($data['comment']);

if($this->form->save())
{
	$this->messageManager->addSuccess(__("Successfully submitted the form"));

}else{
	$this->messageManager->addError(__("fill the form again"));
}

		


$resultRedirect = $this->resultRedirectFactory->create();
$resultRedirect->setPath('example/index/index');
return $resultRedirect;

}
}