<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pqa extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('sundari_productfaq_pqa', 'pqa_id');
    }
}

