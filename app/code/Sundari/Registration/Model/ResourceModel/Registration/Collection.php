<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Registration\Model\ResourceModel\Registration;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'registration_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Sundari\Registration\Model\Registration::class,
            \Sundari\Registration\Model\ResourceModel\Registration::class
        );
    }
}

