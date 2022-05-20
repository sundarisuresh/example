<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Api\Data;

interface VoteSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Vote list.
     * @return \Sundari\Pqa\Api\Data\VoteInterface[]
     */
    public function getItems();

    /**
     * Set questionid list.
     * @param \Sundari\Pqa\Api\Data\VoteInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

