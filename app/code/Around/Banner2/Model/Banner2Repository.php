<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner2\Model;

use Around\Banner2\Api\Banner2RepositoryInterface;
use Around\Banner2\Api\Data\Banner2Interface;
use Around\Banner2\Api\Data\Banner2InterfaceFactory;
use Around\Banner2\Api\Data\Banner2SearchResultsInterfaceFactory;
use Around\Banner2\Model\ResourceModel\Banner2 as ResourceBanner2;
use Around\Banner2\Model\ResourceModel\Banner2\CollectionFactory as Banner2CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class Banner2Repository implements Banner2RepositoryInterface
{

    /**
     * @var Banner2InterfaceFactory
     */
    protected $banner2Factory;

    /**
     * @var Banner2CollectionFactory
     */
    protected $banner2CollectionFactory;

    /**
     * @var Banner2
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceBanner2
     */
    protected $resource;


    /**
     * @param ResourceBanner2 $resource
     * @param Banner2InterfaceFactory $banner2Factory
     * @param Banner2CollectionFactory $banner2CollectionFactory
     * @param Banner2SearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceBanner2 $resource,
        Banner2InterfaceFactory $banner2Factory,
        Banner2CollectionFactory $banner2CollectionFactory,
        Banner2SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->banner2Factory = $banner2Factory;
        $this->banner2CollectionFactory = $banner2CollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(Banner2Interface $banner2)
    {
        try {
            $this->resource->save($banner2);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the banner2: %1',
                $exception->getMessage()
            ));
        }
        return $banner2;
    }

    /**
     * @inheritDoc
     */
    public function get($banner2Id)
    {
        $banner2 = $this->banner2Factory->create();
        $this->resource->load($banner2, $banner2Id);
        if (!$banner2->getId()) {
            throw new NoSuchEntityException(__('Banner2 with id "%1" does not exist.', $banner2Id));
        }
        return $banner2;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->banner2CollectionFactory->create();
        
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
    public function delete(Banner2Interface $banner2)
    {
        try {
            $banner2Model = $this->banner2Factory->create();
            $this->resource->load($banner2Model, $banner2->getBanner2Id());
            $this->resource->delete($banner2Model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Banner2: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($banner2Id)
    {
        return $this->delete($this->get($banner2Id));
    }
}

