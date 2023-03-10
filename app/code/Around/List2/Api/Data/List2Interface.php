<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List2\Api\Data;

interface List2Interface
{

    const LIST2_ID = 'list2_id';
    const PRODUCTID = 'productid';
    const SORTORDER = 'sortorder';
    const ENABLE = 'enable';

    /**
     * Get list2_id
     * @return string|null
     */
    public function getList2Id();

    /**
     * Set list2_id
     * @param string $list2Id
     * @return \Around\List2\List2\Api\Data\List2Interface
     */
    public function setList2Id($list2Id);

    /**
     * Get productid
     * @return string|null
     */
    public function getProductid();

    /**
     * Set productid
     * @param string $productid
     * @return \Around\List2\List2\Api\Data\List2Interface
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
     * @return \Around\List2\List2\Api\Data\List2Interface
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
     * @return \Around\List2\List2\Api\Data\List2Interface
     */
    public function setEnable($enable);
}

