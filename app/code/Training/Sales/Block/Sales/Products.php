<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\Sales\Block\Sales;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Block\Product\ListProduct;
use Magento\Catalog\Helper\Output as OutputHelper;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Data\Helper\PostHelper;
use Magento\Framework\Url\Helper\Data;
use Magento\Framework\View\Element\Template\Context;

/**
 *
 */
class Products extends ListProduct
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        PostHelper                             $postDataHelper,
        Resolver                               $layerResolver,
        CategoryRepositoryInterface            $categoryRepository,
        Data                                   $urlHelper,
        CollectionFactory                      $collectionFactory,
        ?OutputHelper                          $outputHelper = null,
        array                                  $data = []
    )
    {
        $this->_catalogLayer = $layerResolver->get();
        $this->_postDataHelper = $postDataHelper;
        $this->categoryRepository = $categoryRepository;
        $this->urlHelper = $urlHelper;
        $data['outputHelper'] = $outputHelper ?? ObjectManager::getInstance()->get(OutputHelper::class);
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context,
            $postDataHelper,
            $layerResolver,
            $categoryRepository,
            $urlHelper,
            $data,
            $outputHelper);
    }

    /**
     * @return Collection
     */
    public function getProducts()
    {
        $hash = $this->_request->getParam('hash');
        if (!$hash) {
            return $this->collectionFactory->create()
                ->addAttributeToSelect('*')
                ->addAttributeToFilter('hash', array('notnull' => true))
                ->load();
        }
        return $this->collectionFactory->create()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('hash', array('like' => '%' . $hash . '%'))
            ->load();
    }
}
