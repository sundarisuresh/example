<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Emical\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Emi extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('sundari_emical_emi', 'emi_id');
    }
}

