<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Freeproduct\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Template\Context;

class Freeproduct extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    protected $productRepository;


    /**
     * Constructor
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        ProductRepositoryInterface                       $productRepository,
        \Magento\Framework\Registry                      $registry,
        array                                            $data = []
    ) {
        $this->registry = $registry;
        $this->productRepository = $productRepository;


        parent::__construct($context, $data);
    }

    public function getProductBySku()
    {
//        print_r($this->getCurrentProduct().'s');
//        exit;
        $product = $this->productRepository->get($this->getCurrentProduct());
        return $product->getName();
    }

    /**
     * @return string
     */
    public function getCurrentProduct()
    {
        $currentProduct = $this->registry->registry('current_product');
        return $currentProduct->getFreeproduct();
    }
}
