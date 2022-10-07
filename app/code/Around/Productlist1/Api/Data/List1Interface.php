<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productlist1\Api\Data;

interface List1Interface
{

    const ENABLE = 'enable';
    const LIST1_ID = 'list1_id';
    const PRODUCTID = 'productid';
    const SORTORDER = 'sortorder';

    /**
     * Get list1_id
     * @return string|null
     */
    public function getList1Id();

    /**
     * Set list1_id
     * @param string $list1Id
     * @return \Around\Productlist1\List1\Api\Data\List1Interface
     */
    public function setList1Id($list1Id);

    /**
     * Get productid
     * @return string|null
     */
    public function getProductid();

    /**
     * Set productid
     * @param string $productid
     * @return \Around\Productlist1\List1\Api\Data\List1Interface
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
     * @return \Around\Productlist1\List1\Api\Data\List1Interface
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
     * @return \Around\Productlist1\List1\Api\Data\List1Interface
     */
    public function setEnable($enable);
}

