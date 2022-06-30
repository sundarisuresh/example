<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace StageBit\SignupSheet\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use StageBit\SignupSheet\Api\Data\SignupSheetInterface;
use StageBit\SignupSheet\Api\Data\SignupSheetInterfaceFactory;
use StageBit\SignupSheet\Api\Data\SignupSheetSearchResultsInterfaceFactory;
use StageBit\SignupSheet\Api\SignupSheetRepositoryInterface;
use StageBit\SignupSheet\Model\ResourceModel\SignupSheet as ResourceSignupSheet;
use StageBit\SignupSheet\Model\ResourceModel\SignupSheet\CollectionFactory as SignupSheetCollectionFactory;

class SignupSheetRepository implements SignupSheetRepositoryInterface
{

    /**
     * @var ResourceSignupSheet
     */
    protected $resource;

    /**
     * @var SignupSheetCollectionFactory
     */
    protected $signupSheetCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var SignupSheet
     */
    protected $searchResultsFactory;

    /**
     * @var SignupSheetInterfaceFactory
     */
    protected $signupSheetFactory;


    /**
     * @param ResourceSignupSheet $resource
     * @param SignupSheetInterfaceFactory $signupSheetFactory
     * @param SignupSheetCollectionFactory $signupSheetCollectionFactory
     * @param SignupSheetSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceSignupSheet $resource,
        SignupSheetInterfaceFactory $signupSheetFactory,
        SignupSheetCollectionFactory $signupSheetCollectionFactory,
        SignupSheetSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->signupSheetFactory = $signupSheetFactory;
        $this->signupSheetCollectionFactory = $signupSheetCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(SignupSheetInterface $signupSheet)
    {
        try {
            $this->resource->save($signupSheet);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the signupSheet: %1',
                $exception->getMessage()
            ));
        }
        return $signupSheet;
    }

    /**
     * @inheritDoc
     */
    public function get($signupSheetId)
    {
        $signupSheet = $this->signupSheetFactory->create();
        $this->resource->load($signupSheet, $signupSheetId);
        if (!$signupSheet->getId()) {
            throw new NoSuchEntityException(__('SignupSheet with id "%1" does not exist.', $signupSheetId));
        }
        return $signupSheet;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->signupSheetCollectionFactory->create();
        
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
    public function delete(SignupSheetInterface $signupSheet)
    {
        try {
            $signupSheetModel = $this->signupSheetFactory->create();
            $this->resource->load($signupSheetModel, $signupSheet->getSignupsheetId());
            $this->resource->delete($signupSheetModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the SignupSheet: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($signupSheetId)
    {
        return $this->delete($this->get($signupSheetId));
    }
}

