<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner3\Model\ResourceModel\Banner3;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'banner3_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Around\Banner3\Model\Banner3::class,
            \Around\Banner3\Model\ResourceModel\Banner3::class
        );
    }
}

