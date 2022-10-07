<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner3\Model;

use Around\Banner3\Api\Banner3RepositoryInterface;
use Around\Banner3\Api\Data\Banner3Interface;
use Around\Banner3\Api\Data\Banner3InterfaceFactory;
use Around\Banner3\Api\Data\Banner3SearchResultsInterfaceFactory;
use Around\Banner3\Model\ResourceModel\Banner3 as ResourceBanner3;
use Around\Banner3\Model\ResourceModel\Banner3\CollectionFactory as Banner3CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class Banner3Repository implements Banner3RepositoryInterface
{

    /**
     * @var ResourceBanner3
     */
    protected $resource;

    /**
     * @var Banner3InterfaceFactory
     */
    protected $banner3Factory;

    /**
     * @var Banner3CollectionFactory
     */
    protected $banner3CollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Banner3
     */
    protected $searchResultsFactory;


    /**
     * @param ResourceBanner3 $resource
     * @param Banner3InterfaceFactory $banner3Factory
     * @param Banner3CollectionFactory $banner3CollectionFactory
     * @param Banner3SearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceBanner3 $resource,
        Banner3InterfaceFactory $banner3Factory,
        Banner3CollectionFactory $banner3CollectionFactory,
        Banner3SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->banner3Factory = $banner3Factory;
        $this->banner3CollectionFactory = $banner3CollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(Banner3Interface $banner3)
    {
        try {
            $this->resource->save($banner3);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the banner3: %1',
                $exception->getMessage()
            ));
        }
        return $banner3;
    }

    /**
     * @inheritDoc
     */
    public function get($banner3Id)
    {
        $banner3 = $this->banner3Factory->create();
        $this->resource->load($banner3, $banner3Id);
        if (!$banner3->getId()) {
            throw new NoSuchEntityException(__('Banner3 with id "%1" does not exist.', $banner3Id));
        }
        return $banner3;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->banner3CollectionFactory->create();
        
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
    public function delete(Banner3Interface $banner3)
    {
        try {
            $banner3Model = $this->banner3Factory->create();
            $this->resource->load($banner3Model, $banner3->getBanner3Id());
            $this->resource->delete($banner3Model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Banner3: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($banner3Id)
    {
        return $this->delete($this->get($banner3Id));
    }
}

