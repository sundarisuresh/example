<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\ProductRegistration\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductRegistrationRepositoryInterface
{

    /**
     * Save ProductRegistration
     * @param \Training\ProductRegistration\Api\Data\ProductRegistrationInterface $productRegistration
     * @return \Training\ProductRegistration\Api\Data\ProductRegistrationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Training\ProductRegistration\Api\Data\ProductRegistrationInterface $productRegistration
    );

    /**
     * Retrieve ProductRegistration
     * @param string $productregistrationId
     * @return \Training\ProductRegistration\Api\Data\ProductRegistrationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($productregistrationId);

    /**
     * Retrieve ProductRegistration matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Training\ProductRegistration\Api\Data\ProductRegistrationSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete ProductRegistration
     * @param \Training\ProductRegistration\Api\Data\ProductRegistrationInterface $productRegistration
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Training\ProductRegistration\Api\Data\ProductRegistrationInterface $productRegistration
    );

    /**
     * Delete ProductRegistration by ID
     * @param string $productregistrationId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($productregistrationId);
}

