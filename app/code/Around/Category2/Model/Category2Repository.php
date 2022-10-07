<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Category2\Model;

use Around\Category2\Api\Category2RepositoryInterface;
use Around\Category2\Api\Data\Category2Interface;
use Around\Category2\Api\Data\Category2InterfaceFactory;
use Around\Category2\Api\Data\Category2SearchResultsInterfaceFactory;
use Around\Category2\Model\ResourceModel\Category2 as ResourceCategory2;
use Around\Category2\Model\ResourceModel\Category2\CollectionFactory as Category2CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class Category2Repository implements Category2RepositoryInterface
{

    /**
     * @var Category2CollectionFactory
     */
    protected $category2CollectionFactory;

    /**
     * @var ResourceCategory2
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Category2InterfaceFactory
     */
    protected $category2Factory;

    /**
     * @var Category2
     */
    protected $searchResultsFactory;


    /**
     * @param ResourceCategory2 $resource
     * @param Category2InterfaceFactory $category2Factory
     * @param Category2CollectionFactory $category2CollectionFactory
     * @param Category2SearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCategory2 $resource,
        Category2InterfaceFactory $category2Factory,
        Category2CollectionFactory $category2CollectionFactory,
        Category2SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->category2Factory = $category2Factory;
        $this->category2CollectionFactory = $category2CollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(Category2Interface $category2)
    {
        try {
            $this->resource->save($category2);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the category2: %1',
                $exception->getMessage()
            ));
        }
        return $category2;
    }

    /**
     * @inheritDoc
     */
    public function get($category2Id)
    {
        $category2 = $this->category2Factory->create();
        $this->resource->load($category2, $category2Id);
        if (!$category2->getId()) {
            throw new NoSuchEntityException(__('Category2 with id "%1" does not exist.', $category2Id));
        }
        return $category2;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->category2CollectionFactory->create();
        
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
    public function delete(Category2Interface $category2)
    {
        try {
            $category2Model = $this->category2Factory->create();
            $this->resource->load($category2Model, $category2->getCategory2Id());
            $this->resource->delete($category2Model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Category2: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($category2Id)
    {
        return $this->delete($this->get($category2Id));
    }
}

