<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productlist1\Model;

use Around\Productlist1\Api\Data\List1Interface;
use Magento\Framework\Model\AbstractModel;

class List1 extends AbstractModel implements List1Interface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\Productlist1\Model\ResourceModel\List1::class);
    }

    /**
     * @inheritDoc
     */
    public function getList1Id()
    {
        return $this->getData(self::LIST1_ID);
    }

    /**
     * @inheritDoc
     */
    public function setList1Id($list1Id)
    {
        return $this->setData(self::LIST1_ID, $list1Id);
    }

    /**
     * @inheritDoc
     */
    public function getProductid()
    {
        return $this->getData(self::PRODUCTID);
    }

    /**
     * @inheritDoc
     */
    public function setProductid($productid)
    {
        return $this->setData(self::PRODUCTID, $productid);
    }

    /**
     * @inheritDoc
     */
    public function getSortorder()
    {
        return $this->getData(self::SORTORDER);
    }

    /**
     * @inheritDoc
     */
    public function setSortorder($sortorder)
    {
        return $this->setData(self::SORTORDER, $sortorder);
    }

    /**
     * @inheritDoc
     */
    public function getEnable()
    {
        return $this->getData(self::ENABLE);
    }

    /**
     * @inheritDoc
     */
    public function setEnable($enable)
    {
        return $this->setData(self::ENABLE, $enable);
    }
}

