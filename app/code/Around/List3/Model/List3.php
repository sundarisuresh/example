<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\List3\Model;

use Around\List3\Api\Data\List3Interface;
use Magento\Framework\Model\AbstractModel;

class List3 extends AbstractModel implements List3Interface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\List3\Model\ResourceModel\List3::class);
    }

    /**
     * @inheritDoc
     */
    public function getList3Id()
    {
        return $this->getData(self::LIST3_ID);
    }

    /**
     * @inheritDoc
     */
    public function setList3Id($list3Id)
    {
        return $this->setData(self::LIST3_ID, $list3Id);
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

