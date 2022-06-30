<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace StageBit\SignupSheet\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SignupSheet extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('stagebit_signupsheet_signupsheet', 'signupsheet_id');
    }
}

