<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\ProductRegistration\Model\ResourceModel\ProductRegistration;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'productregistration_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Training\ProductRegistration\Model\ProductRegistration::class,
            \Training\ProductRegistration\Model\ResourceModel\ProductRegistration::class
        );
    }
}

