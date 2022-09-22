<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Application\Api\Data;

interface ApplicationSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Application list.
     * @return \Sundari\Application\Api\Data\ApplicationInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Sundari\Application\Api\Data\ApplicationInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

