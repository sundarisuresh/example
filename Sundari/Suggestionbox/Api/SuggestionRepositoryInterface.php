<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestionbox\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SuggestionRepositoryInterface
{

    /**
     * Save Suggestion
     * @param \Sundari\Suggestionbox\Api\Data\SuggestionInterface $suggestion
     * @return \Sundari\Suggestionbox\Api\Data\SuggestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Sundari\Suggestionbox\Api\Data\SuggestionInterface $suggestion
    );

    /**
     * Retrieve Suggestion
     * @param string $suggestionId
     * @return \Sundari\Suggestionbox\Api\Data\SuggestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($suggestionId);

    /**
     * Retrieve Suggestion matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sundari\Suggestionbox\Api\Data\SuggestionSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Suggestion
     * @param \Sundari\Suggestionbox\Api\Data\SuggestionInterface $suggestion
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Sundari\Suggestionbox\Api\Data\SuggestionInterface $suggestion
    );

    /**
     * Delete Suggestion by ID
     * @param string $suggestionId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($suggestionId);
}

