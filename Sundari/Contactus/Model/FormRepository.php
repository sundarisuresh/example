<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Contactus\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sundari\Contactus\Api\Data\FormInterface;
use Sundari\Contactus\Api\Data\FormInterfaceFactory;
use Sundari\Contactus\Api\Data\FormSearchResultsInterfaceFactory;
use Sundari\Contactus\Api\FormRepositoryInterface;
use Sundari\Contactus\Model\ResourceModel\Form as ResourceForm;
use Sundari\Contactus\Model\ResourceModel\Form\CollectionFactory as FormCollectionFactory;

class FormRepository implements FormRepositoryInterface
{

    /**
     * @var FormCollectionFactory
     */
    protected $formCollectionFactory;

    /**
     * @var FormInterfaceFactory
     */
    protected $formFactory;

    /**
     * @var Form
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceForm
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceForm $resource
     * @param FormInterfaceFactory $formFactory
     * @param FormCollectionFactory $formCollectionFactory
     * @param FormSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceForm $resource,
        FormInterfaceFactory $formFactory,
        FormCollectionFactory $formCollectionFactory,
        FormSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->formFactory = $formFactory;
        $this->formCollectionFactory = $formCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(FormInterface $form)
    {
        try {
            $this->resource->save($form);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the form: %1',
                $exception->getMessage()
            ));
        }
        return $form;
    }

    /**
     * @inheritDoc
     */
    public function get($formId)
    {
        $form = $this->formFactory->create();
        $this->resource->load($form, $formId);
        if (!$form->getId()) {
            throw new NoSuchEntityException(__('Form with id "%1" does not exist.', $formId));
        }
        return $form;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->formCollectionFactory->create();
        
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
    public function delete(FormInterface $form)
    {
        try {
            $formModel = $this->formFactory->create();
            $this->resource->load($formModel, $form->getFormId());
            $this->resource->delete($formModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Form: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($formId)
    {
        return $this->delete($this->get($formId));
    }
}

