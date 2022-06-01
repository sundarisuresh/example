<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Controller\Index;

use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $rule;
    protected $productRepository;
    protected $messageManager;
    protected $resultRedirectFactory;


    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        PageFactory                               $resultPageFactory,
        ProductRepositoryInterface $productRepository,
        \Sundari\Suggestproduct\Model\RuleFactory $rule,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
        \Magento\Framework\App\Action\Context     $context
    ) {
        $this->rule = $rule;
        $this->messageManager = $messageManager;
        $this->resultPageFactory = $resultPageFactory;
        $this->productRepository = $productRepository;
        $this->resultRedirectFactory=$resultRedirectFactory;
        return parent::__construct($context);
    }

    public function getProductUrl($pro)
    {
        $product = $this->productRepository->get($pro);
        return $product->getProductUrl();
    }

    public function getqaCollection($data)
    {
        $collection = $this->rule->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('answer1', "1," . $data[1])
            ->addFieldToFilter('answer2', "2," . $data[2])
            ->load();
        return $collection;
    }
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $qa = $this->getqaCollection($data);
        if ($qa->count() == 1) {
            $row = $qa->getFirstItem();
            $product = $row->getData('product');
            $this->messageManager->addSuccess(__("This product suited for you"));
            $url=$this->getProductUrl($product);
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setUrl($url);
            return $resultRedirect;
        }
        $this->messageManager->addError(__("sorry,current products not suited for you"));


        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
        return $resultRedirect;
    }
}
