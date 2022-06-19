<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Model\ResourceModel\Pqa;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'pqa_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Sundari\Productfaq\Model\Pqa::class,
            \Sundari\Productfaq\Model\ResourceModel\Pqa::class
        );
    }
}

