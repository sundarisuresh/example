<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BannerRepositoryInterface
{

    /**
     * Save Banner
     * @param \Around\Banner\Api\Data\BannerInterface $banner
     * @return \Around\Banner\Api\Data\BannerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\Banner\Api\Data\BannerInterface $banner
    );

    /**
     * Retrieve Banner
     * @param string $bannerId
     * @return \Around\Banner\Api\Data\BannerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($bannerId);

    /**
     * Retrieve Banner matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\Banner\Api\Data\BannerSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Banner
     * @param \Around\Banner\Api\Data\BannerInterface $banner
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\Banner\Api\Data\BannerInterface $banner
    );

    /**
     * Delete Banner by ID
     * @param string $bannerId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bannerId);
}

