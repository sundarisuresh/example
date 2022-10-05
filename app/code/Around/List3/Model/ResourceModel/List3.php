<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List3\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class List3 extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('around_list3_list3', 'list3_id');
    }
}

