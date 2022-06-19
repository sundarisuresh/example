<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Registration\Api\Data;

interface RegistrationSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Registration list.
     * @return \Sundari\Registration\Api\Data\RegistrationInterface[]
     */
    public function getItems();

    /**
     * Set dateofpurchase list.
     * @param \Sundari\Registration\Api\Data\RegistrationInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

