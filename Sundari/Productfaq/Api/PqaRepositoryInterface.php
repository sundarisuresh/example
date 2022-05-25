<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PqaRepositoryInterface
{

    /**
     * Save Pqa
     * @param \Sundari\Productfaq\Api\Data\PqaInterface $pqa
     * @return \Sundari\Productfaq\Api\Data\PqaInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Sundari\Productfaq\Api\Data\PqaInterface $pqa
    );

    /**
     * Retrieve Pqa
     * @param string $pqaId
     * @return \Sundari\Productfaq\Api\Data\PqaInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($pqaId);

    /**
     * Retrieve Pqa matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sundari\Productfaq\Api\Data\PqaSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Pqa
     * @param \Sundari\Productfaq\Api\Data\PqaInterface $pqa
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Sundari\Productfaq\Api\Data\PqaInterface $pqa
    );

    /**
     * Delete Pqa by ID
     * @param string $pqaId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($pqaId);
}

