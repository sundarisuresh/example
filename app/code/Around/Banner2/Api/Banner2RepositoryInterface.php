<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner2\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface Banner2RepositoryInterface
{

    /**
     * Save Banner2
     * @param \Around\Banner2\Api\Data\Banner2Interface $banner2
     * @return \Around\Banner2\Api\Data\Banner2Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\Banner2\Api\Data\Banner2Interface $banner2
    );

    /**
     * Retrieve Banner2
     * @param string $banner2Id
     * @return \Around\Banner2\Api\Data\Banner2Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($banner2Id);

    /**
     * Retrieve Banner2 matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\Banner2\Api\Data\Banner2SearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Banner2
     * @param \Around\Banner2\Api\Data\Banner2Interface $banner2
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\Banner2\Api\Data\Banner2Interface $banner2
    );

    /**
     * Delete Banner2 by ID
     * @param string $banner2Id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($banner2Id);
}

