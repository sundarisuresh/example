<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List3\Api\Data;

interface List3SearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get List3 list.
     * @return \Around\List3\Api\Data\List3Interface[]
     */
    public function getItems();

    /**
     * Set productid list.
     * @param \Around\List3\Api\Data\List3Interface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

