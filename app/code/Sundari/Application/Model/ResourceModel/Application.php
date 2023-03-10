<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Application\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Application extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('sundari_application_application', 'application_id');
    }
}

