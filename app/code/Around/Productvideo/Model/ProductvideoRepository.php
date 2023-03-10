<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productvideo\Model;

use Around\Productvideo\Api\Data\ProductvideoInterface;
use Around\Productvideo\Api\Data\ProductvideoInterfaceFactory;
use Around\Productvideo\Api\Data\ProductvideoSearchResultsInterfaceFactory;
use Around\Productvideo\Api\ProductvideoRepositoryInterface;
use Around\Productvideo\Model\ResourceModel\Productvideo as ResourceProductvideo;
use Around\Productvideo\Model\ResourceModel\Productvideo\CollectionFactory as ProductvideoCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductvideoRepository implements ProductvideoRepositoryInterface
{

    /**
     * @var ProductvideoCollectionFactory
     */
    protected $productvideoCollectionFactory;

    /**
     * @var ProductvideoInterfaceFactory
     */
    protected $productvideoFactory;

    /**
     * @var Productvideo
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceProductvideo
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceProductvideo $resource
     * @param ProductvideoInterfaceFactory $productvideoFactory
     * @param ProductvideoCollectionFactory $productvideoCollectionFactory
     * @param ProductvideoSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceProductvideo $resource,
        ProductvideoInterfaceFactory $productvideoFactory,
        ProductvideoCollectionFactory $productvideoCollectionFactory,
        ProductvideoSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->productvideoFactory = $productvideoFactory;
        $this->productvideoCollectionFactory = $productvideoCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(ProductvideoInterface $productvideo)
    {
        try {
            $this->resource->save($productvideo);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the productvideo: %1',
                $exception->getMessage()
            ));
        }
        return $productvideo;
    }

    /**
     * @inheritDoc
     */
    public function get($productvideoId)
    {
        $productvideo = $this->productvideoFactory->create();
        $this->resource->load($productvideo, $productvideoId);
        if (!$productvideo->getId()) {
            throw new NoSuchEntityException(__('Productvideo with id "%1" does not exist.', $productvideoId));
        }
        return $productvideo;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->productvideoCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(ProductvideoInterface $productvideo)
    {
        try {
            $productvideoModel = $this->productvideoFactory->create();
            $this->resource->load($productvideoModel, $productvideo->getProductvideoId());
            $this->resource->delete($productvideoModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Productvideo: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($productvideoId)
    {
        return $this->delete($this->get($productvideoId));
    }
}

