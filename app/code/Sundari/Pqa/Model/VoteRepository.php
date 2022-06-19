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
use Sundari\Pqa\Api\Data\VoteInterface;
use Sundari\Pqa\Api\Data\VoteInterfaceFactory;
use Sundari\Pqa\Api\Data\VoteSearchResultsInterfaceFactory;
use Sundari\Pqa\Api\VoteRepositoryInterface;
use Sundari\Pqa\Model\ResourceModel\Vote as ResourceVote;
use Sundari\Pqa\Model\ResourceModel\Vote\CollectionFactory as VoteCollectionFactory;

class VoteRepository implements VoteRepositoryInterface
{

    /**
     * @var ResourceVote
     */
    protected $resource;

    /**
     * @var Vote
     */
    protected $searchResultsFactory;

    /**
     * @var VoteCollectionFactory
     */
    protected $voteCollectionFactory;

    /**
     * @var VoteInterfaceFactory
     */
    protected $voteFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceVote $resource
     * @param VoteInterfaceFactory $voteFactory
     * @param VoteCollectionFactory $voteCollectionFactory
     * @param VoteSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceVote $resource,
        VoteInterfaceFactory $voteFactory,
        VoteCollectionFactory $voteCollectionFactory,
        VoteSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->voteFactory = $voteFactory;
        $this->voteCollectionFactory = $voteCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(VoteInterface $vote)
    {
        try {
            $this->resource->save($vote);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the vote: %1',
                $exception->getMessage()
            ));
        }
        return $vote;
    }

    /**
     * @inheritDoc
     */
    public function get($voteId)
    {
        $vote = $this->voteFactory->create();
        $this->resource->load($vote, $voteId);
        if (!$vote->getId()) {
            throw new NoSuchEntityException(__('Vote with id "%1" does not exist.', $voteId));
        }
        return $vote;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->voteCollectionFactory->create();
        
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
    public function delete(VoteInterface $vote)
    {
        try {
            $voteModel = $this->voteFactory->create();
            $this->resource->load($voteModel, $vote->getVoteId());
            $this->resource->delete($voteModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Vote: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($voteId)
    {
        return $this->delete($this->get($voteId));
    }
}

