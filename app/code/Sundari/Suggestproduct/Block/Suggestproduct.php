<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Block;

class Suggestproduct extends \Magento\Framework\View\Element\Template
{
protected $questionans;
    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Sundari\Suggestproduct\Model\QuestionansFactory $questionans,
        array $data = []
    ) {$this->QuestionansFactory=$questionans;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getqaCollection()
    {
        $collection = $this->QuestionansFactory->create()
            ->getCollection()->addFieldToSelect('*')->load();
        return $collection;
    }
}

