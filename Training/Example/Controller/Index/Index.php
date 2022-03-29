<?php
namespace Training\Example\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Index implements ActionInterface 
{
	protected $resultfactory;

	// this is constructor
	public function __construct(
		RawFactory $resultfactory
		)
	{
       $this->resultfactory = $resultfactory;
    }

	// this is controller
	public function execute()
	{
		
		return $this->resultfactory->create()->setContents("fruits");
	}
}