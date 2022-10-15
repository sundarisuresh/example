<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productvideo\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductvideoRepositoryInterface
{

    /**
     * Save Productvideo
     * @param \Around\Productvideo\Api\Data\ProductvideoInterface $productvideo
     * @return \Around\Productvideo\Api\Data\ProductvideoInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\Productvideo\Api\Data\ProductvideoInterface $productvideo
    );

    /**
     * Retrieve Productvideo
     * @param string $productvideoId
     * @return \Around\Productvideo\Api\Data\ProductvideoInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($productvideoId);

    /**
     * Retrieve Productvideo matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\Productvideo\Api\Data\ProductvideoSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Productvideo
     * @param \Around\Productvideo\Api\Data\ProductvideoInterface $productvideo
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\Productvideo\Api\Data\ProductvideoInterface $productvideo
    );

    /**
     * Delete Productvideo by ID
     * @param string $productvideoId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($productvideoId);
}

