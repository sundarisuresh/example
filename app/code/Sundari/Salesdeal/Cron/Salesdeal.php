<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Salesdeal\Cron;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product\Attribute\Source\Status;

class Salesdeal
{
    protected $storeManager;
    protected $emulation;
    protected $productCollectionFactory;
    protected $productStatus;
    protected $productVisibility;
    protected $logger;
    private $productRepository;


    /**
     * Constructor
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(ProductRepositoryInterface $productRepository,
        \Psr\Log\LoggerInterface                                       $logger,
        \Magento\Store\Model\StoreManagerInterface                     $storeManager,
        \Magento\Store\Model\App\Emulation                             $emulation,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Attribute\Source\Status         $productStatus,
        \Magento\Catalog\Model\Product\Visibility                      $productVisibility
    )
    {
        $this->storeManager = $storeManager;
        $this->emulation = $emulation;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->productStatus = $productStatus;
        $this->productVisibility = $productVisibility;
        $this->logger = $logger;
        $this->productRepository = $productRepository;
    }

    /**
     * Execute the cron
     * @return void
     */
    public function execute()
    {
        $this->emulation->startEnvironmentEmulation(1, \Magento\Framework\App\Area::AREA_FRONTEND, true);

        $collection = $this->productCollectionFactory->create();
        $now = new \DateTime();
        $collection
            ->addAttributeToSelect('*')
//            ->addStoreFilter($this->storeManager->getStore()->getId())
            ->addAttributeToFilter('status', ['eq' => Status::STATUS_ENABLED])
        ->addAttributeToFilter('time', ['lteq' => $now->format('Y-m-d H:i:s')]);
        foreach ($collection as $item) {
            $item->setStatus(Status::STATUS_DISABLED);
            $this->productRepository->save($item);

//            print_r($item->getData('name'));
        }

        $this->emulation->stopEnvironmentEmulation();
//        $this->logger->addInfo("Cronjob Salesdeal is executed.");
    }
}
