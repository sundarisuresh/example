<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List2\Model;

use Around\List2\Api\Data\List2Interface;
use Magento\Framework\Model\AbstractModel;

class List2 extends AbstractModel implements List2Interface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\List2\Model\ResourceModel\List2::class);
    }

    /**
     * @inheritDoc
     */
    public function getList2Id()
    {
        return $this->getData(self::LIST2_ID);
    }

    /**
     * @inheritDoc
     */
    public function setList2Id($list2Id)
    {
        return $this->setData(self::LIST2_ID, $list2Id);
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

