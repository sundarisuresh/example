<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface QaRepositoryInterface
{

    /**
     * Save Qa
     * @param \Sundari\Pqa\Api\Data\QaInterface $qa
     * @return \Sundari\Pqa\Api\Data\QaInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Sundari\Pqa\Api\Data\QaInterface $qa);

    /**
     * Retrieve Qa
     * @param string $qaId
     * @return \Sundari\Pqa\Api\Data\QaInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($qaId);

    /**
     * Retrieve Qa matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sundari\Pqa\Api\Data\QaSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Qa
     * @param \Sundari\Pqa\Api\Data\QaInterface $qa
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Sundari\Pqa\Api\Data\QaInterface $qa);

    /**
     * Delete Qa by ID
     * @param string $qaId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($qaId);
}

