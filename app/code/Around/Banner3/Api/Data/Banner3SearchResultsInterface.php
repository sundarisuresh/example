<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner3\Api\Data;

interface Banner3SearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Banner3 list.
     * @return \Around\Banner3\Api\Data\Banner3Interface[]
     */
    public function getItems();

    /**
     * Set image list.
     * @param \Around\Banner3\Api\Data\Banner3Interface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

