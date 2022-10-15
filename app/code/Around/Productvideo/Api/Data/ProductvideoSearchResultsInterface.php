<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productvideo\Api\Data;

interface ProductvideoSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Productvideo list.
     * @return \Around\Productvideo\Api\Data\ProductvideoInterface[]
     */
    public function getItems();

    /**
     * Set productsku list.
     * @param \Around\Productvideo\Api\Data\ProductvideoInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

