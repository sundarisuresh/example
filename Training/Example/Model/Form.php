<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Example\Model;

use Magento\Framework\Model\AbstractModel;

class Form extends AbstractModel
{
    public function _construct()
    {
        $this->_init(\Training\Example\Model\ResourceModel\Form::class);
    }

}

