<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Api\Data;

interface PqaSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Pqa list.
     * @return \Sundari\Productfaq\Api\Data\PqaInterface[]
     */
    public function getItems();

    /**
     * Set question list.
     * @param \Sundari\Productfaq\Api\Data\PqaInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

