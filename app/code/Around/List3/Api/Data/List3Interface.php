<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List3\Api\Data;

interface List3Interface
{

    const ENABLE = 'enable';
    const PRODUCTID = 'productid';
    const LIST3_ID = 'list3_id';
    const SORTORDER = 'sortorder';

    /**
     * Get list3_id
     * @return string|null
     */
    public function getList3Id();

    /**
     * Set list3_id
     * @param string $list3Id
     * @return \Around\List3\List3\Api\Data\List3Interface
     */
    public function setList3Id($list3Id);

    /**
     * Get productid
     * @return string|null
     */
    public function getProductid();

    /**
     * Set productid
     * @param string $productid
     * @return \Around\List3\List3\Api\Data\List3Interface
     */
    public function setProductid($productid);

    /**
     * Get sortorder
     * @return string|null
     */
    public function getSortorder();

    /**
     * Set sortorder
     * @param string $sortorder
     * @return \Around\List3\List3\Api\Data\List3Interface
     */
    public function setSortorder($sortorder);

    /**
     * Get enable
     * @return string|null
     */
    public function getEnable();

    /**
     * Set enable
     * @param string $enable
     * @return \Around\List3\List3\Api\Data\List3Interface
     */
    public function setEnable($enable);
}

