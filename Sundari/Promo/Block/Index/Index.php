<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Promo\Block\Index;

class Index extends \Magento\Framework\View\Element\Template

{
    protected $productcollectionfactory;
    protected $categoryFactory; 
    protected $imageHelper;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Helper\Image $imageHelper,
        array $data = []
    ) 
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->categoryFactory = $categoryFactory;
        $this->imageHelper= $imageHelper;
        parent::__construct($context, $data);
    }
    public function getProductCollection()
    { 
              $collection = $this->productCollectionFactory->create();
            $collection
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('price', ['lt' => 49]);
            return $collection;
    }
    public function getProductImage($product)
    {
        $imageUrl = $this->imageHelper->init($product, 'product_page_image_small')
                        ->setImageFile($product->getSmallImage()) // image,small_image,thumbnail
                        ->resize(380)
                        ->getUrl();
        return $imageUrl;
    }
}    
