<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List2\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class List2 extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('around_list2_list2', 'list2_id');
    }
}

