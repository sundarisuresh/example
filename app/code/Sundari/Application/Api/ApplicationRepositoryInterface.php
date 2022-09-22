<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Application\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ApplicationRepositoryInterface
{

    /**
     * Save Application
     * @param \Sundari\Application\Api\Data\ApplicationInterface $application
     * @return \Sundari\Application\Api\Data\ApplicationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Sundari\Application\Api\Data\ApplicationInterface $application
    );

    /**
     * Retrieve Application
     * @param string $applicationId
     * @return \Sundari\Application\Api\Data\ApplicationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($applicationId);

    /**
     * Retrieve Application matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sundari\Application\Api\Data\ApplicationSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Application
     * @param \Sundari\Application\Api\Data\ApplicationInterface $application
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Sundari\Application\Api\Data\ApplicationInterface $application
    );

    /**
     * Delete Application by ID
     * @param string $applicationId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($applicationId);
}

