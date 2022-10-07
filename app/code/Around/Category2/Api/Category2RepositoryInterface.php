<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Category2\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface Category2RepositoryInterface
{

    /**
     * Save Category2
     * @param \Around\Category2\Api\Data\Category2Interface $category2
     * @return \Around\Category2\Api\Data\Category2Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\Category2\Api\Data\Category2Interface $category2
    );

    /**
     * Retrieve Category2
     * @param string $category2Id
     * @return \Around\Category2\Api\Data\Category2Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($category2Id);

    /**
     * Retrieve Category2 matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\Category2\Api\Data\Category2SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Category2
     * @param \Around\Category2\Api\Data\Category2Interface $category2
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\Category2\Api\Data\Category2Interface $category2
    );

    /**
     * Delete Category2 by ID
     * @param string $category2Id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($category2Id);
}

