<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Itemcategory\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ItemcategoryRepositoryInterface
{

    /**
     * Save Itemcategory
     * @param \Around\Itemcategory\Api\Data\ItemcategoryInterface $itemcategory
     * @return \Around\Itemcategory\Api\Data\ItemcategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Around\Itemcategory\Api\Data\ItemcategoryInterface $itemcategory
    );

    /**
     * Retrieve Itemcategory
     * @param string $itemcategoryId
     * @return \Around\Itemcategory\Api\Data\ItemcategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($itemcategoryId);

    /**
     * Retrieve Itemcategory matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Around\Itemcategory\Api\Data\ItemcategorySearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Itemcategory
     * @param \Around\Itemcategory\Api\Data\ItemcategoryInterface $itemcategory
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Around\Itemcategory\Api\Data\ItemcategoryInterface $itemcategory
    );

    /**
     * Delete Itemcategory by ID
     * @param string $itemcategoryId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($itemcategoryId);
}

