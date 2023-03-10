<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\Sales\Block\Sales;

use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 *
 */
class Index extends Template
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Context           $context,
        CollectionFactory $collectionFactory,
        array             $data = []
    )
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getHash()
    {
        $productCollection = $this->getProducts();
        foreach ($productCollection as $product) {
            $items = explode(",", $product->getData('hash'));
            foreach ($items as $item) {
                $hashtag[] = $item;
            }
        }
        return array_unique($hashtag);
    }

    /**
     * @return Collection
     */
    public function getProducts()
    {
        $productCollection = $this->collectionFactory->create()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('hash', array('notnull' => true))
            ->load();
        return $productCollection;
    }
}

