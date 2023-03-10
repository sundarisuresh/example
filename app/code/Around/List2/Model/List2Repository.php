<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List2\Model;

use Around\List2\Api\Data\List2Interface;
use Around\List2\Api\Data\List2InterfaceFactory;
use Around\List2\Api\Data\List2SearchResultsInterfaceFactory;
use Around\List2\Api\List2RepositoryInterface;
use Around\List2\Model\ResourceModel\List2 as ResourceList2;
use Around\List2\Model\ResourceModel\List2\CollectionFactory as List2CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class List2Repository implements List2RepositoryInterface
{

    /**
     * @var List2
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceList2
     */
    protected $resource;

    /**
     * @var List2CollectionFactory
     */
    protected $list2CollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var List2InterfaceFactory
     */
    protected $list2Factory;


    /**
     * @param ResourceList2 $resource
     * @param List2InterfaceFactory $list2Factory
     * @param List2CollectionFactory $list2CollectionFactory
     * @param List2SearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceList2 $resource,
        List2InterfaceFactory $list2Factory,
        List2CollectionFactory $list2CollectionFactory,
        List2SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->list2Factory = $list2Factory;
        $this->list2CollectionFactory = $list2CollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(List2Interface $list2)
    {
        try {
            $this->resource->save($list2);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the list2: %1',
                $exception->getMessage()
            ));
        }
        return $list2;
    }

    /**
     * @inheritDoc
     */
    public function get($list2Id)
    {
        $list2 = $this->list2Factory->create();
        $this->resource->load($list2, $list2Id);
        if (!$list2->getId()) {
            throw new NoSuchEntityException(__('List2 with id "%1" does not exist.', $list2Id));
        }
        return $list2;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->list2CollectionFactory->create();
        
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
    public function delete(List2Interface $list2)
    {
        try {
            $list2Model = $this->list2Factory->create();
            $this->resource->load($list2Model, $list2->getList2Id());
            $this->resource->delete($list2Model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the List2: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($list2Id)
    {
        return $this->delete($this->get($list2Id));
    }
}

