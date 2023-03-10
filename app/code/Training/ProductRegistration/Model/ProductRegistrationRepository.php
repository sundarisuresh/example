<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\ProductRegistration\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Training\ProductRegistration\Api\Data\ProductRegistrationInterface;
use Training\ProductRegistration\Api\Data\ProductRegistrationInterfaceFactory;
use Training\ProductRegistration\Api\Data\ProductRegistrationSearchResultsInterfaceFactory;
use Training\ProductRegistration\Api\ProductRegistrationRepositoryInterface;
use Training\ProductRegistration\Model\ResourceModel\ProductRegistration as ResourceProductRegistration;
use Training\ProductRegistration\Model\ResourceModel\ProductRegistration\CollectionFactory as ProductRegistrationCollectionFactory;

class ProductRegistrationRepository implements ProductRegistrationRepositoryInterface
{

    /**
     * @var ResourceProductRegistration
     */
    protected $resource;

    /**
     * @var ProductRegistration
     */
    protected $searchResultsFactory;

    /**
     * @var ProductRegistrationInterfaceFactory
     */
    protected $productRegistrationFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ProductRegistrationCollectionFactory
     */
    protected $productRegistrationCollectionFactory;


    /**
     * @param ResourceProductRegistration $resource
     * @param ProductRegistrationInterfaceFactory $productRegistrationFactory
     * @param ProductRegistrationCollectionFactory $productRegistrationCollectionFactory
     * @param ProductRegistrationSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceProductRegistration $resource,
        ProductRegistrationInterfaceFactory $productRegistrationFactory,
        ProductRegistrationCollectionFactory $productRegistrationCollectionFactory,
        ProductRegistrationSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->productRegistrationFactory = $productRegistrationFactory;
        $this->productRegistrationCollectionFactory = $productRegistrationCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        ProductRegistrationInterface $productRegistration
    ) {
        try {
            $this->resource->save($productRegistration);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the productRegistration: %1',
                $exception->getMessage()
            ));
        }
        return $productRegistration;
    }

    /**
     * @inheritDoc
     */
    public function get($productRegistrationId)
    {
        $productRegistration = $this->productRegistrationFactory->create();
        $this->resource->load($productRegistration, $productRegistrationId);
        if (!$productRegistration->getId()) {
            throw new NoSuchEntityException(__('ProductRegistration with id "%1" does not exist.', $productRegistrationId));
        }
        return $productRegistration;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->productRegistrationCollectionFactory->create();
        
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
    public function delete(
        ProductRegistrationInterface $productRegistration
    ) {
        try {
            $productRegistrationModel = $this->productRegistrationFactory->create();
            $this->resource->load($productRegistrationModel, $productRegistration->getProductregistrationId());
            $this->resource->delete($productRegistrationModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the ProductRegistration: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($productRegistrationId)
    {
        return $this->delete($this->get($productRegistrationId));
    }
}

