<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestionbox\Api\Data;

interface SuggestionSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Suggestion list.
     * @return \Sundari\Suggestionbox\Api\Data\SuggestionInterface[]
     */
    public function getItems();

    /**
     * Set suggestion list.
     * @param \Sundari\Suggestionbox\Api\Data\SuggestionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

