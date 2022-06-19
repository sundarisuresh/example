<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestionbox\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Suggestion extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('sundari_suggestionbox_suggestion', 'suggestion_id');
    }
}

