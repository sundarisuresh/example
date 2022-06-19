<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestionbox\Model\ResourceModel\Suggestion;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'suggestion_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Sundari\Suggestionbox\Model\Suggestion::class,
            \Sundari\Suggestionbox\Model\ResourceModel\Suggestion::class
        );
    }
}

