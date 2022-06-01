<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Api\Data;

interface RuleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get rule list.
     * @return \Sundari\Suggestproduct\Api\Data\RuleInterface[]
     */
    public function getItems();

    /**
     * Set answer1 list.
     * @param \Sundari\Suggestproduct\Api\Data\RuleInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

