<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Model\ResourceModel\Questionans;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'questionans_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Sundari\Suggestproduct\Model\Questionans::class,
            \Sundari\Suggestproduct\Model\ResourceModel\Questionans::class
        );
    }
}

