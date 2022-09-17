<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Model\Customer\Address\Attribute\Source;

class Label extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => '1', 'label' => __('Home')],
                ['value' => '2', 'label' => __('Others')],
                ['value' => '3', 'label' => __('Office')],

            ];
        }
        return $this->_options;
    }
}

