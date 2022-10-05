<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List3\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface List3RepositoryInterface
{

    /**
     * Save List3
     * @param \Around\List3\Api\Data\List3Interface $list3
     * @return \Around\List3\Api\Data\List3Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\List3\Api\Data\List3Interface $list3
    );

    /**
     * Retrieve List3
     * @param string $list3Id
     * @return \Around\List3\Api\Data\List3Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($list3Id);

    /**
     * Retrieve List3 matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\List3\Api\Data\List3SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete List3
     * @param \Around\List3\Api\Data\List3Interface $list3
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\List3\Api\Data\List3Interface $list3
    );

    /**
     * Delete List3 by ID
     * @param string $list3Id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($list3Id);
}

