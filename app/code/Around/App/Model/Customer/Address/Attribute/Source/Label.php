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
                ['value' => '', 'label' => __('Select Save as')],
                ['value' => 'home', 'label' => __('Home')],
                ['value' => 'others', 'label' => __('Others')],
                ['value' => 'office', 'label' => __('Office')],
            ];
        }
        return $this->_options;
    }
}

