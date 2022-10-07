<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Itemcategory\Model;

use Around\Itemcategory\Api\Data\ItemcategoryInterface;
use Around\Itemcategory\Api\Data\ItemcategoryInterfaceFactory;
use Around\Itemcategory\Api\Data\ItemcategorySearchResultsInterfaceFactory;
use Around\Itemcategory\Api\ItemcategoryRepositoryInterface;
use Around\Itemcategory\Model\ResourceModel\Itemcategory as ResourceItemcategory;
use Around\Itemcategory\Model\ResourceModel\Itemcategory\CollectionFactory as ItemcategoryCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ItemcategoryRepository implements ItemcategoryRepositoryInterface
{

    /**
     * @var ItemcategoryCollectionFactory
     */
    protected $itemcategoryCollectionFactory;

    /**
     * @var ItemcategoryInterfaceFactory
     */
    protected $itemcategoryFactory;

    /**
     * @var Itemcategory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceItemcategory
     */
    protected $resource;


    /**
     * @param ResourceItemcategory $resource
     * @param ItemcategoryInterfaceFactory $itemcategoryFactory
     * @param ItemcategoryCollectionFactory $itemcategoryCollectionFactory
     * @param ItemcategorySearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceItemcategory $resource,
        ItemcategoryInterfaceFactory $itemcategoryFactory,
        ItemcategoryCollectionFactory $itemcategoryCollectionFactory,
        ItemcategorySearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->itemcategoryFactory = $itemcategoryFactory;
        $this->itemcategoryCollectionFactory = $itemcategoryCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(ItemcategoryInterface $itemcategory)
    {
        try {
            $this->resource->save($itemcategory);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the itemcategory: %1',
                $exception->getMessage()
            ));
        }
        return $itemcategory;
    }

    /**
     * @inheritDoc
     */
    public function get($itemcategoryId)
    {
        $itemcategory = $this->itemcategoryFactory->create();
        $this->resource->load($itemcategory, $itemcategoryId);
        if (!$itemcategory->getId()) {
            throw new NoSuchEntityException(__('Itemcategory with id "%1" does not exist.', $itemcategoryId));
        }
        return $itemcategory;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->itemcategoryCollectionFactory->create();
        
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
    public function delete(ItemcategoryInterface $itemcategory)
    {
        try {
            $itemcategoryModel = $this->itemcategoryFactory->create();
            $this->resource->load($itemcategoryModel, $itemcategory->getItemcategoryId());
            $this->resource->delete($itemcategoryModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Itemcategory: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($itemcategoryId)
    {
        return $this->delete($this->get($itemcategoryId));
    }
}

