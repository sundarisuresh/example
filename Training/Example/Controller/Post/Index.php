<?php
namespace Training\Example\Controller\Post;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Index extends \Magento\Framework\App\Action\Action 
{
	protected $_pageFactory;

	protected $form;


	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Training\Example\Model\Form $form
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->form = $form;
		return parent::__construct($context);
	}


	// this is controller
	public function execute()
	{
		echo "test";

		$data = $this->getRequest()->getParams();

    echo "<pre>";
    print_r($data);

$this->form->setName($data['name']);
$this->form->setEmail($data['email']);
$this->form->setTelephone($data['telephone']);
$this->form->setComment($data['comment']);
$this->form->save();
// $this->form->load(1);
// $this->form->delete();
    exit;

		return $this->_pageFactory->create();
	}
}