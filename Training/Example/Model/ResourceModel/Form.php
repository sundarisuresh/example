<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Example\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Form extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('contactus', 'id');
    }
}
