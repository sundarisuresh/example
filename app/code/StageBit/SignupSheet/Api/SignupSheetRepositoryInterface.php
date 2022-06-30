<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace StageBit\SignupSheet\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SignupSheetRepositoryInterface
{

    /**
     * Save SignupSheet
     * @param \StageBit\SignupSheet\Api\Data\SignupSheetInterface $signupSheet
     * @return \StageBit\SignupSheet\Api\Data\SignupSheetInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \StageBit\SignupSheet\Api\Data\SignupSheetInterface $signupSheet
    );

    /**
     * Retrieve SignupSheet
     * @param string $signupsheetId
     * @return \StageBit\SignupSheet\Api\Data\SignupSheetInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($signupsheetId);

    /**
     * Retrieve SignupSheet matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \StageBit\SignupSheet\Api\Data\SignupSheetSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete SignupSheet
     * @param \StageBit\SignupSheet\Api\Data\SignupSheetInterface $signupSheet
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \StageBit\SignupSheet\Api\Data\SignupSheetInterface $signupSheet
    );

    /**
     * Delete SignupSheet by ID
     * @param string $signupsheetId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($signupsheetId);
}

