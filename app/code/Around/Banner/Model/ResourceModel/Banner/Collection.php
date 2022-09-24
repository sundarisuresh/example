<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner\Model\ResourceModel\Banner;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'banner_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Around\Banner\Model\Banner::class,
            \Around\Banner\Model\ResourceModel\Banner::class
        );
    }
}

