<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sundari\Pqa\Api\Data\QaInterface;
use Sundari\Pqa\Api\Data\QaInterfaceFactory;
use Sundari\Pqa\Api\Data\QaSearchResultsInterfaceFactory;
use Sundari\Pqa\Api\QaRepositoryInterface;
use Sundari\Pqa\Model\ResourceModel\Qa as ResourceQa;
use Sundari\Pqa\Model\ResourceModel\Qa\CollectionFactory as QaCollectionFactory;

class QaRepository implements QaRepositoryInterface
{

    /**
     * @var ResourceQa
     */
    protected $resource;

    /**
     * @var QaCollectionFactory
     */
    protected $qaCollectionFactory;

    /**
     * @var QaInterfaceFactory
     */
    protected $qaFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Qa
     */
    protected $searchResultsFactory;


    /**
     * @param ResourceQa $resource
     * @param QaInterfaceFactory $qaFactory
     * @param QaCollectionFactory $qaCollectionFactory
     * @param QaSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceQa $resource,
        QaInterfaceFactory $qaFactory,
        QaCollectionFactory $qaCollectionFactory,
        QaSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->qaFactory = $qaFactory;
        $this->qaCollectionFactory = $qaCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(QaInterface $qa)
    {
        try {
            $this->resource->save($qa);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the qa: %1',
                $exception->getMessage()
            ));
        }
        return $qa;
    }

    /**
     * @inheritDoc
     */
    public function get($qaId)
    {
        $qa = $this->qaFactory->create();
        $this->resource->load($qa, $qaId);
        if (!$qa->getId()) {
            throw new NoSuchEntityException(__('Qa with id "%1" does not exist.', $qaId));
        }
        return $qa;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->qaCollectionFactory->create();
        
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
    public function delete(QaInterface $qa)
    {
        try {
            $qaModel = $this->qaFactory->create();
            $this->resource->load($qaModel, $qa->getQaId());
            $this->resource->delete($qaModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Qa: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($qaId)
    {
        return $this->delete($this->get($qaId));
    }
}

