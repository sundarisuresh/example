<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Api\Data;

interface QaSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Qa list.
     * @return \Sundari\Pqa\Api\Data\QaInterface[]
     */
    public function getItems();

    /**
     * Set question list.
     * @param \Sundari\Pqa\Api\Data\QaInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

