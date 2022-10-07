<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productlist1\Model;

use Around\Productlist1\Api\Data\List1Interface;
use Around\Productlist1\Api\Data\List1InterfaceFactory;
use Around\Productlist1\Api\Data\List1SearchResultsInterfaceFactory;
use Around\Productlist1\Api\List1RepositoryInterface;
use Around\Productlist1\Model\ResourceModel\List1 as ResourceList1;
use Around\Productlist1\Model\ResourceModel\List1\CollectionFactory as List1CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class List1Repository implements List1RepositoryInterface
{

    /**
     * @var List1InterfaceFactory
     */
    protected $list1Factory;

    /**
     * @var List1CollectionFactory
     */
    protected $list1CollectionFactory;

    /**
     * @var List1
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceList1
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceList1 $resource
     * @param List1InterfaceFactory $list1Factory
     * @param List1CollectionFactory $list1CollectionFactory
     * @param List1SearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceList1 $resource,
        List1InterfaceFactory $list1Factory,
        List1CollectionFactory $list1CollectionFactory,
        List1SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->list1Factory = $list1Factory;
        $this->list1CollectionFactory = $list1CollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(List1Interface $list1)
    {
        try {
            $this->resource->save($list1);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the list1: %1',
                $exception->getMessage()
            ));
        }
        return $list1;
    }

    /**
     * @inheritDoc
     */
    public function get($list1Id)
    {
        $list1 = $this->list1Factory->create();
        $this->resource->load($list1, $list1Id);
        if (!$list1->getId()) {
            throw new NoSuchEntityException(__('List1 with id "%1" does not exist.', $list1Id));
        }
        return $list1;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->list1CollectionFactory->create();
        
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
    public function delete(List1Interface $list1)
    {
        try {
            $list1Model = $this->list1Factory->create();
            $this->resource->load($list1Model, $list1->getList1Id());
            $this->resource->delete($list1Model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the List1: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($list1Id)
    {
        return $this->delete($this->get($list1Id));
    }
}

