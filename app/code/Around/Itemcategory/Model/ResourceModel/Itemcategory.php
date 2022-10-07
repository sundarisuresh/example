<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Itemcategory\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Itemcategory extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('around_itemcategory_itemcategory', 'itemcategory_id');
    }
}

