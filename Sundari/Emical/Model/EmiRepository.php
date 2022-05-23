<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Emical\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sundari\Emical\Api\Data\EmiInterface;
use Sundari\Emical\Api\Data\EmiInterfaceFactory;
use Sundari\Emical\Api\Data\EmiSearchResultsInterfaceFactory;
use Sundari\Emical\Api\EmiRepositoryInterface;
use Sundari\Emical\Model\ResourceModel\Emi as ResourceEmi;
use Sundari\Emical\Model\ResourceModel\Emi\CollectionFactory as EmiCollectionFactory;

class EmiRepository implements EmiRepositoryInterface
{

    /**
     * @var Emi
     */
    protected $searchResultsFactory;

    /**
     * @var EmiCollectionFactory
     */
    protected $emiCollectionFactory;

    /**
     * @var EmiInterfaceFactory
     */
    protected $emiFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceEmi
     */
    protected $resource;


    /**
     * @param ResourceEmi $resource
     * @param EmiInterfaceFactory $emiFactory
     * @param EmiCollectionFactory $emiCollectionFactory
     * @param EmiSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceEmi $resource,
        EmiInterfaceFactory $emiFactory,
        EmiCollectionFactory $emiCollectionFactory,
        EmiSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->emiFactory = $emiFactory;
        $this->emiCollectionFactory = $emiCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(EmiInterface $emi)
    {
        try {
            $this->resource->save($emi);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the emi: %1',
                $exception->getMessage()
            ));
        }
        return $emi;
    }

    /**
     * @inheritDoc
     */
    public function get($emiId)
    {
        $emi = $this->emiFactory->create();
        $this->resource->load($emi, $emiId);
        if (!$emi->getId()) {
            throw new NoSuchEntityException(__('emi with id "%1" does not exist.', $emiId));
        }
        return $emi;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->emiCollectionFactory->create();
        
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
    public function delete(EmiInterface $emi)
    {
        try {
            $emiModel = $this->emiFactory->create();
            $this->resource->load($emiModel, $emi->getEmiId());
            $this->resource->delete($emiModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the emi: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($emiId)
    {
        return $this->delete($this->get($emiId));
    }
}

