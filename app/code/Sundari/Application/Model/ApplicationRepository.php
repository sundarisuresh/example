<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Application\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sundari\Application\Api\ApplicationRepositoryInterface;
use Sundari\Application\Api\Data\ApplicationInterface;
use Sundari\Application\Api\Data\ApplicationInterfaceFactory;
use Sundari\Application\Api\Data\ApplicationSearchResultsInterfaceFactory;
use Sundari\Application\Model\ResourceModel\Application as ResourceApplication;
use Sundari\Application\Model\ResourceModel\Application\CollectionFactory as ApplicationCollectionFactory;

class ApplicationRepository implements ApplicationRepositoryInterface
{

    /**
     * @var ApplicationInterfaceFactory
     */
    protected $applicationFactory;

    /**
     * @var ResourceApplication
     */
    protected $resource;

    /**
     * @var ApplicationCollectionFactory
     */
    protected $applicationCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Application
     */
    protected $searchResultsFactory;


    /**
     * @param ResourceApplication $resource
     * @param ApplicationInterfaceFactory $applicationFactory
     * @param ApplicationCollectionFactory $applicationCollectionFactory
     * @param ApplicationSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceApplication $resource,
        ApplicationInterfaceFactory $applicationFactory,
        ApplicationCollectionFactory $applicationCollectionFactory,
        ApplicationSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->applicationFactory = $applicationFactory;
        $this->applicationCollectionFactory = $applicationCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(ApplicationInterface $application)
    {
        try {
            $this->resource->save($application);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the application: %1',
                $exception->getMessage()
            ));
        }
        return $application;
    }

    /**
     * @inheritDoc
     */
    public function get($applicationId)
    {
        $application = $this->applicationFactory->create();
        $this->resource->load($application, $applicationId);
        if (!$application->getId()) {
            throw new NoSuchEntityException(__('Application with id "%1" does not exist.', $applicationId));
        }
        return $application;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->applicationCollectionFactory->create();
        
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
    public function delete(ApplicationInterface $application)
    {
        try {
            $applicationModel = $this->applicationFactory->create();
            $this->resource->load($applicationModel, $application->getApplicationId());
            $this->resource->delete($applicationModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Application: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($applicationId)
    {
        return $this->delete($this->get($applicationId));
    }
}

