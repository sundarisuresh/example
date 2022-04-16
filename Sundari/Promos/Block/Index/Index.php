<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Sundari\Promos\Block\Index;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $productCollectionFactory;
    protected $categoryFactory;
    protected $imageUrl;



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
        \Magento\Catalog\Helper\Image $imageUrl,
        array $data = []
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->categoryFactory = $categoryFactory;
        $this->imageUrl = $imageUrl;
        parent::__construct($context, $data);
    }
    public function getProductCollection()
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        $collection->addAttributeToFilter('price', ['lt' => 49]);
        return $collection;
    }
    public function getProductImage($product)
    {
        $imageUrl = $this->imageUrl->init($product, 'product_page_image_small')
                ->setImageFile($product->getSmallImage()) // image,small_image,thumbnail
                ->resize(380)
                ->getUrl();
            return $imageUrl;
    }
    public function getProName($product){
        return $product->getName();

    }
}
