<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Category2\Api\Data;

interface Category2SearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Category2 list.
     * @return \Around\Category2\Api\Data\Category2Interface[]
     */
    public function getItems();

    /**
     * Set image list.
     * @param \Around\Category2\Api\Data\Category2Interface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

