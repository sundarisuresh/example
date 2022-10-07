<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List3\Model;

use Around\List3\Api\Data\List3Interface;
use Around\List3\Api\Data\List3InterfaceFactory;
use Around\List3\Api\Data\List3SearchResultsInterfaceFactory;
use Around\List3\Api\List3RepositoryInterface;
use Around\List3\Model\ResourceModel\List3 as ResourceList3;
use Around\List3\Model\ResourceModel\List3\CollectionFactory as List3CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class List3Repository implements List3RepositoryInterface
{

    /**
     * @var List3CollectionFactory
     */
    protected $list3CollectionFactory;

    /**
     * @var List3
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var List3InterfaceFactory
     */
    protected $list3Factory;

    /**
     * @var ResourceList3
     */
    protected $resource;


    /**
     * @param ResourceList3 $resource
     * @param List3InterfaceFactory $list3Factory
     * @param List3CollectionFactory $list3CollectionFactory
     * @param List3SearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceList3 $resource,
        List3InterfaceFactory $list3Factory,
        List3CollectionFactory $list3CollectionFactory,
        List3SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->list3Factory = $list3Factory;
        $this->list3CollectionFactory = $list3CollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(List3Interface $list3)
    {
        try {
            $this->resource->save($list3);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the list3: %1',
                $exception->getMessage()
            ));
        }
        return $list3;
    }

    /**
     * @inheritDoc
     */
    public function get($list3Id)
    {
        $list3 = $this->list3Factory->create();
        $this->resource->load($list3, $list3Id);
        if (!$list3->getId()) {
            throw new NoSuchEntityException(__('List3 with id "%1" does not exist.', $list3Id));
        }
        return $list3;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->list3CollectionFactory->create();
        
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
    public function delete(List3Interface $list3)
    {
        try {
            $list3Model = $this->list3Factory->create();
            $this->resource->load($list3Model, $list3->getList3Id());
            $this->resource->delete($list3Model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the List3: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($list3Id)
    {
        return $this->delete($this->get($list3Id));
    }
}

