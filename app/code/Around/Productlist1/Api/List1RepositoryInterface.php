<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productlist1\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface List1RepositoryInterface
{

    /**
     * Save List1
     * @param \Around\Productlist1\Api\Data\List1Interface $list1
     * @return \Around\Productlist1\Api\Data\List1Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\Productlist1\Api\Data\List1Interface $list1
    );

    /**
     * Retrieve List1
     * @param string $list1Id
     * @return \Around\Productlist1\Api\Data\List1Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($list1Id);

    /**
     * Retrieve List1 matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\Productlist1\Api\Data\List1SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete List1
     * @param \Around\Productlist1\Api\Data\List1Interface $list1
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\Productlist1\Api\Data\List1Interface $list1
    );

    /**
     * Delete List1 by ID
     * @param string $list1Id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($list1Id);
}

