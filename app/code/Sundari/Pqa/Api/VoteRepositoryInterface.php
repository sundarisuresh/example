<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface VoteRepositoryInterface
{

    /**
     * Save Vote
     * @param \Sundari\Pqa\Api\Data\VoteInterface $vote
     * @return \Sundari\Pqa\Api\Data\VoteInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Sundari\Pqa\Api\Data\VoteInterface $vote
    );

    /**
     * Retrieve Vote
     * @param string $voteId
     * @return \Sundari\Pqa\Api\Data\VoteInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($voteId);

    /**
     * Retrieve Vote matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sundari\Pqa\Api\Data\VoteSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Vote
     * @param \Sundari\Pqa\Api\Data\VoteInterface $vote
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Sundari\Pqa\Api\Data\VoteInterface $vote
    );

    /**
     * Delete Vote by ID
     * @param string $voteId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($voteId);
}

