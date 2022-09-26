<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Categories;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\Itemcategory\Model\ItemcategoryFactory;

/**
 *
 */
class Index extends Template
{
    /**`
     * @var Logo
     */
    protected $logo;
    protected $itemcategory;

    /**
     * Constructor
     * @param Context $context
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context $context,
        Logo    $logo,
        ItemcategoryFactory $itemcategory,


        array   $data = []
    )
    {
        $this->logo = $logo;
        $this->itemcategory = $itemcategory;


        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }

    public function getItemcategory()
    {
        $item= $this->itemcategory->create()->getCollection();
        return $item;
    }
}


