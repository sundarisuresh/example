<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner2\Api\Data;

interface Banner2SearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Banner2 list.
     * @return \Around\Banner2\Api\Data\Banner2Interface[]
     */
    public function getItems();

    /**
     * Set image list.
     * @param \Around\Banner2\Api\Data\Banner2Interface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

