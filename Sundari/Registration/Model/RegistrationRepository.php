<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Registration\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sundari\Registration\Api\Data\RegistrationInterface;
use Sundari\Registration\Api\Data\RegistrationInterfaceFactory;
use Sundari\Registration\Api\Data\RegistrationSearchResultsInterfaceFactory;
use Sundari\Registration\Api\RegistrationRepositoryInterface;
use Sundari\Registration\Model\ResourceModel\Registration as ResourceRegistration;
use Sundari\Registration\Model\ResourceModel\Registration\CollectionFactory as RegistrationCollectionFactory;

class RegistrationRepository implements RegistrationRepositoryInterface
{

    /**
     * @var ResourceRegistration
     */
    protected $resource;

    /**
     * @var RegistrationInterfaceFactory
     */
    protected $registrationFactory;

    /**
     * @var Registration
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var RegistrationCollectionFactory
     */
    protected $registrationCollectionFactory;


    /**
     * @param ResourceRegistration $resource
     * @param RegistrationInterfaceFactory $registrationFactory
     * @param RegistrationCollectionFactory $registrationCollectionFactory
     * @param RegistrationSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceRegistration $resource,
        RegistrationInterfaceFactory $registrationFactory,
        RegistrationCollectionFactory $registrationCollectionFactory,
        RegistrationSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->registrationFactory = $registrationFactory;
        $this->registrationCollectionFactory = $registrationCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(RegistrationInterface $registration)
    {
        try {
            $this->resource->save($registration);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the registration: %1',
                $exception->getMessage()
            ));
        }
        return $registration;
    }

    /**
     * @inheritDoc
     */
    public function get($registrationId)
    {
        $registration = $this->registrationFactory->create();
        $this->resource->load($registration, $registrationId);
        if (!$registration->getId()) {
            throw new NoSuchEntityException(__('Registration with id "%1" does not exist.', $registrationId));
        }
        return $registration;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->registrationCollectionFactory->create();
        
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
    public function delete(RegistrationInterface $registration)
    {
        try {
            $registrationModel = $this->registrationFactory->create();
            $this->resource->load($registrationModel, $registration->getRegistrationId());
            $this->resource->delete($registrationModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Registration: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($registrationId)
    {
        return $this->delete($this->get($registrationId));
    }
}

