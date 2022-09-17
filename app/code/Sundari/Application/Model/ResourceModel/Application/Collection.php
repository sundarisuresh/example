<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Application\Model\ResourceModel\Application;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'application_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Sundari\Application\Model\Application::class,
            \Sundari\Application\Model\ResourceModel\Application::class
        );
    }
}

