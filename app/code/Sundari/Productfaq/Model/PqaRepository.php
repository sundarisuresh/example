<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sundari\Productfaq\Api\Data\PqaInterface;
use Sundari\Productfaq\Api\Data\PqaInterfaceFactory;
use Sundari\Productfaq\Api\Data\PqaSearchResultsInterfaceFactory;
use Sundari\Productfaq\Api\PqaRepositoryInterface;
use Sundari\Productfaq\Model\ResourceModel\Pqa as ResourcePqa;
use Sundari\Productfaq\Model\ResourceModel\Pqa\CollectionFactory as PqaCollectionFactory;

class PqaRepository implements PqaRepositoryInterface
{

    /**
     * @var ResourcePqa
     */
    protected $resource;

    /**
     * @var PqaCollectionFactory
     */
    protected $pqaCollectionFactory;

    /**
     * @var Pqa
     */
    protected $searchResultsFactory;

    /**
     * @var PqaInterfaceFactory
     */
    protected $pqaFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourcePqa $resource
     * @param PqaInterfaceFactory $pqaFactory
     * @param PqaCollectionFactory $pqaCollectionFactory
     * @param PqaSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourcePqa $resource,
        PqaInterfaceFactory $pqaFactory,
        PqaCollectionFactory $pqaCollectionFactory,
        PqaSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->pqaFactory = $pqaFactory;
        $this->pqaCollectionFactory = $pqaCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(PqaInterface $pqa)
    {
        try {
            $this->resource->save($pqa);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the pqa: %1',
                $exception->getMessage()
            ));
        }
        return $pqa;
    }

    /**
     * @inheritDoc
     */
    public function get($pqaId)
    {
        $pqa = $this->pqaFactory->create();
        $this->resource->load($pqa, $pqaId);
        if (!$pqa->getId()) {
            throw new NoSuchEntityException(__('Pqa with id "%1" does not exist.', $pqaId));
        }
        return $pqa;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->pqaCollectionFactory->create();
        
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
    public function delete(PqaInterface $pqa)
    {
        try {
            $pqaModel = $this->pqaFactory->create();
            $this->resource->load($pqaModel, $pqa->getPqaId());
            $this->resource->delete($pqaModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Pqa: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($pqaId)
    {
        return $this->delete($this->get($pqaId));
    }
}

