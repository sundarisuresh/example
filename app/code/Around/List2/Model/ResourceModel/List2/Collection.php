<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List2\Model\ResourceModel\List2;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'list2_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Around\List2\Model\List2::class,
            \Around\List2\Model\ResourceModel\List2::class
        );
    }
}

