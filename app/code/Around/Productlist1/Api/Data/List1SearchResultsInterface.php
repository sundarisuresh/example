<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productlist1\Api\Data;

interface List1SearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get List1 list.
     * @return \Around\Productlist1\Api\Data\List1Interface[]
     */
    public function getItems();

    /**
     * Set productid list.
     * @param \Around\Productlist1\Api\Data\List1Interface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

