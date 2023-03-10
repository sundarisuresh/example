<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\ProductRegistration\Api\Data;

interface ProductRegistrationSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get ProductRegistration list.
     * @return \Training\ProductRegistration\Api\Data\ProductRegistrationInterface[]
     */
    public function getItems();

    /**
     * Set dop list.
     * @param \Training\ProductRegistration\Api\Data\ProductRegistrationInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

