<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface QuestionansRepositoryInterface
{

    /**
     * Save questionans
     * @param \Sundari\Suggestproduct\Api\Data\QuestionansInterface $questionans
     * @return \Sundari\Suggestproduct\Api\Data\QuestionansInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Sundari\Suggestproduct\Api\Data\QuestionansInterface $questionans
    );

    /**
     * Retrieve questionans
     * @param string $questionansId
     * @return \Sundari\Suggestproduct\Api\Data\QuestionansInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($questionansId);

    /**
     * Retrieve questionans matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sundari\Suggestproduct\Api\Data\QuestionansSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete questionans
     * @param \Sundari\Suggestproduct\Api\Data\QuestionansInterface $questionans
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Sundari\Suggestproduct\Api\Data\QuestionansInterface $questionans
    );

    /**
     * Delete questionans by ID
     * @param string $questionansId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($questionansId);
}

