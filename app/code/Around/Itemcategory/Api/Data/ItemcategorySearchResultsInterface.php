<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Itemcategory\Api\Data;

interface ItemcategorySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Itemcategory list.
     * @return \Around\Itemcategory\Api\Data\ItemcategoryInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Around\Itemcategory\Api\Data\ItemcategoryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

