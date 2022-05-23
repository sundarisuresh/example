<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Emical\Api\Data;

interface EmiSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get emi list.
     * @return \Sundari\Emical\Api\Data\EmiInterface[]
     */
    public function getItems();

    /**
     * Set month list.
     * @param \Sundari\Emical\Api\Data\EmiInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

