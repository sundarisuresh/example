<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Api\Data;

interface FaqSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get faq list.
     * @return \Sundari\Productfaq\Api\Data\FaqInterface[]
     */
    public function getItems();

    /**
     * Set question list.
     * @param \Sundari\Productfaq\Api\Data\FaqInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

