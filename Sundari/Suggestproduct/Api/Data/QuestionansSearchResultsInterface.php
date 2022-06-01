<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Api\Data;

interface QuestionansSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get questionans list.
     * @return \Sundari\Suggestproduct\Api\Data\QuestionansInterface[]
     */
    public function getItems();

    /**
     * Set question list.
     * @param \Sundari\Suggestproduct\Api\Data\QuestionansInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

