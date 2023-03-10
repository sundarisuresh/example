<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner3\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface Banner3RepositoryInterface
{

    /**
     * Save Banner3
     * @param \Around\Banner3\Api\Data\Banner3Interface $banner3
     * @return \Around\Banner3\Api\Data\Banner3Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\Banner3\Api\Data\Banner3Interface $banner3
    );

    /**
     * Retrieve Banner3
     * @param string $banner3Id
     * @return \Around\Banner3\Api\Data\Banner3Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($banner3Id);

    /**
     * Retrieve Banner3 matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\Banner3\Api\Data\Banner3SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Banner3
     * @param \Around\Banner3\Api\Data\Banner3Interface $banner3
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\Banner3\Api\Data\Banner3Interface $banner3
    );

    /**
     * Delete Banner3 by ID
     * @param string $banner3Id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($banner3Id);
}

