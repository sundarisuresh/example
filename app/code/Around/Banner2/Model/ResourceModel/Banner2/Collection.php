<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner2\Model\ResourceModel\Banner2;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'banner2_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Around\Banner2\Model\Banner2::class,
            \Around\Banner2\Model\ResourceModel\Banner2::class
        );
    }
}

