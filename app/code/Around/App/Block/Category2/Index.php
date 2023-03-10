<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Category2;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\Category2\Model\Category2Factory;

/**
 *
 */
class Index extends Template
{
    /**`
     * @var Logo
     */
//    protected $logo;
    protected $category2;

    /**
     * Constructor
     * @param Context $context
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context $context,
//        Logo    $logo,
        Category2Factory $category2,


        array   $data = []
    )
    {
//        $this->logo = $logo;
        $this->category2 = $category2;


        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
//    public function getLogoSrc()
//    {
//        return $this->logo->getLogoSrc();
//    }

    public function getCategory2()
    {
        $item= $this->category2->create()->getCollection();
        $item->setOrder('sortorder','ASC');

        return $item;
    }
}


