<?php
namespace Training\Example\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Index extends \Magento\Framework\App\Action\Action 
{
	// protected $resultfactory;

	// // this is constructor
	// public function __construct(
	// 	RawFactory $resultfactory
	// 	)
	// {
    //    $this->resultfactory = $resultfactory;
    // }



	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}


	// this is controller
	public function execute()
	{
		
		return $this->_pageFactory->create();
	}
}