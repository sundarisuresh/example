<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace StageBit\SignupSheet\Api\Data;

interface SignupSheetSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get SignupSheet list.
     * @return \StageBit\SignupSheet\Api\Data\SignupSheetInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \StageBit\SignupSheet\Api\Data\SignupSheetInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

