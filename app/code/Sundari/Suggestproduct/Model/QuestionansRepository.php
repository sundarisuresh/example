<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sundari\Suggestproduct\Api\Data\QuestionansInterface;
use Sundari\Suggestproduct\Api\Data\QuestionansInterfaceFactory;
use Sundari\Suggestproduct\Api\Data\QuestionansSearchResultsInterfaceFactory;
use Sundari\Suggestproduct\Api\QuestionansRepositoryInterface;
use Sundari\Suggestproduct\Model\ResourceModel\Questionans as ResourceQuestionans;
use Sundari\Suggestproduct\Model\ResourceModel\Questionans\CollectionFactory as QuestionansCollectionFactory;

class QuestionansRepository implements QuestionansRepositoryInterface
{

    /**
     * @var QuestionansCollectionFactory
     */
    protected $questionansCollectionFactory;

    /**
     * @var QuestionansInterfaceFactory
     */
    protected $questionansFactory;

    /**
     * @var Questionans
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceQuestionans
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceQuestionans $resource
     * @param QuestionansInterfaceFactory $questionansFactory
     * @param QuestionansCollectionFactory $questionansCollectionFactory
     * @param QuestionansSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceQuestionans $resource,
        QuestionansInterfaceFactory $questionansFactory,
        QuestionansCollectionFactory $questionansCollectionFactory,
        QuestionansSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->questionansFactory = $questionansFactory;
        $this->questionansCollectionFactory = $questionansCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(QuestionansInterface $questionans)
    {
        try {
            $this->resource->save($questionans);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the questionans: %1',
                $exception->getMessage()
            ));
        }
        return $questionans;
    }

    /**
     * @inheritDoc
     */
    public function get($questionansId)
    {
        $questionans = $this->questionansFactory->create();
        $this->resource->load($questionans, $questionansId);
        if (!$questionans->getId()) {
            throw new NoSuchEntityException(__('questionans with id "%1" does not exist.', $questionansId));
        }
        return $questionans;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->questionansCollectionFactory->create();
        
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
    public function delete(QuestionansInterface $questionans)
    {
        try {
            $questionansModel = $this->questionansFactory->create();
            $this->resource->load($questionansModel, $questionans->getQuestionansId());
            $this->resource->delete($questionansModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the questionans: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($questionansId)
    {
        return $this->delete($this->get($questionansId));
    }
}

