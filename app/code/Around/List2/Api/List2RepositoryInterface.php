<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List2\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface List2RepositoryInterface
{

    /**
     * Save List2
     * @param \Around\List2\Api\Data\List2Interface $list2
     * @return \Around\List2\Api\Data\List2Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\List2\Api\Data\List2Interface $list2
    );

    /**
     * Retrieve List2
     * @param string $list2Id
     * @return \Around\List2\Api\Data\List2Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($list2Id);

    /**
     * Retrieve List2 matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\List2\Api\Data\List2SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete List2
     * @param \Around\List2\Api\Data\List2Interface $list2
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\List2\Api\Data\List2Interface $list2
    );

    /**
     * Delete List2 by ID
     * @param string $list2Id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($list2Id);
}

