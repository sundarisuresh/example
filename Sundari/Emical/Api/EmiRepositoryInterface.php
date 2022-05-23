<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Emical\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface EmiRepositoryInterface
{

    /**
     * Save emi
     * @param \Sundari\Emical\Api\Data\EmiInterface $emi
     * @return \Sundari\Emical\Api\Data\EmiInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Sundari\Emical\Api\Data\EmiInterface $emi
    );

    /**
     * Retrieve emi
     * @param string $emiId
     * @return \Sundari\Emical\Api\Data\EmiInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($emiId);

    /**
     * Retrieve emi matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sundari\Emical\Api\Data\EmiSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete emi
     * @param \Sundari\Emical\Api\Data\EmiInterface $emi
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Sundari\Emical\Api\Data\EmiInterface $emi
    );

    /**
     * Delete emi by ID
     * @param string $emiId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($emiId);
}

