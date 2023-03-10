<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productlist1\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class List1 extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('around_productlist1_list1', 'list1_id');
    }
}

