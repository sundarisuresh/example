<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Registration\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface RegistrationRepositoryInterface
{

    /**
     * Save Registration
     * @param \Sundari\Registration\Api\Data\RegistrationInterface $registration
     * @return \Sundari\Registration\Api\Data\RegistrationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Sundari\Registration\Api\Data\RegistrationInterface $registration
    );

    /**
     * Retrieve Registration
     * @param string $registrationId
     * @return \Sundari\Registration\Api\Data\RegistrationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($registrationId);

    /**
     * Retrieve Registration matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sundari\Registration\Api\Data\RegistrationSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Registration
     * @param \Sundari\Registration\Api\Data\RegistrationInterface $registration
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Sundari\Registration\Api\Data\RegistrationInterface $registration
    );

    /**
     * Delete Registration by ID
     * @param string $registrationId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($registrationId);
}

