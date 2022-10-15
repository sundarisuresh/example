<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productvideo\Model\ResourceModel\Productvideo;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'productvideo_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Around\Productvideo\Model\Productvideo::class,
            \Around\Productvideo\Model\ResourceModel\Productvideo::class
        );
    }
}

