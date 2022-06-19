<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Api\Data;

interface VoteSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Vote list.
     * @return \Sundari\Productfaq\Api\Data\VoteInterface[]
     */
    public function getItems();

    /**
     * Set queid list.
     * @param \Sundari\Productfaq\Api\Data\VoteInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

