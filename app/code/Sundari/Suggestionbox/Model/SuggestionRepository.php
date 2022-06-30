<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestionbox\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sundari\Suggestionbox\Api\Data\SuggestionInterface;
use Sundari\Suggestionbox\Api\Data\SuggestionInterfaceFactory;
use Sundari\Suggestionbox\Api\Data\SuggestionSearchResultsInterfaceFactory;
use Sundari\Suggestionbox\Api\SuggestionRepositoryInterface;
use Sundari\Suggestionbox\Model\ResourceModel\Suggestion as ResourceSuggestion;
use Sundari\Suggestionbox\Model\ResourceModel\Suggestion\CollectionFactory as SuggestionCollectionFactory;

class SuggestionRepository implements SuggestionRepositoryInterface
{

    /**
     * @var SuggestionInterfaceFactory
     */
    protected $suggestionFactory;

    /**
     * @var SuggestionCollectionFactory
     */
    protected $suggestionCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceSuggestion
     */
    protected $resource;

    /**
     * @var Suggestion
     */
    protected $searchResultsFactory;


    /**
     * @param ResourceSuggestion $resource
     * @param SuggestionInterfaceFactory $suggestionFactory
     * @param SuggestionCollectionFactory $suggestionCollectionFactory
     * @param SuggestionSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceSuggestion $resource,
        SuggestionInterfaceFactory $suggestionFactory,
        SuggestionCollectionFactory $suggestionCollectionFactory,
        SuggestionSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->suggestionFactory = $suggestionFactory;
        $this->suggestionCollectionFactory = $suggestionCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(SuggestionInterface $suggestion)
    {
        try {
            $this->resource->save($suggestion);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the suggestion: %1',
                $exception->getMessage()
            ));
        }
        return $suggestion;
    }

    /**
     * @inheritDoc
     */
    public function get($suggestionId)
    {
        $suggestion = $this->suggestionFactory->create();
        $this->resource->load($suggestion, $suggestionId);
        if (!$suggestion->getId()) {
            throw new NoSuchEntityException(__('Suggestion with id "%1" does not exist.', $suggestionId));
        }
        return $suggestion;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->suggestionCollectionFactory->create();
        
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
    public function delete(SuggestionInterface $suggestion)
    {
        try {
            $suggestionModel = $this->suggestionFactory->create();
            $this->resource->load($suggestionModel, $suggestion->getSuggestionId());
            $this->resource->delete($suggestionModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Suggestion: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($suggestionId)
    {
        return $this->delete($this->get($suggestionId));
    }
}

