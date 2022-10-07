<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List2\Api\Data;

interface List2SearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get List2 list.
     * @return \Around\List2\Api\Data\List2Interface[]
     */
    public function getItems();

    /**
     * Set productid list.
     * @param \Around\List2\Api\Data\List2Interface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

