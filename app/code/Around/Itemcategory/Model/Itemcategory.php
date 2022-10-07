<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Itemcategory\Model;

use Around\Itemcategory\Api\Data\ItemcategoryInterface;
use Magento\Framework\Model\AbstractModel;

class Itemcategory extends AbstractModel implements ItemcategoryInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\Itemcategory\Model\ResourceModel\Itemcategory::class);
    }

    /**
     * @inheritDoc
     */
    public function getItemcategoryId()
    {
        return $this->getData(self::ITEMCATEGORY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setItemcategoryId($itemcategoryId)
    {
        return $this->setData(self::ITEMCATEGORY_ID, $itemcategoryId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * @inheritDoc
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
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
    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    /**
     * @inheritDoc
     */
    public function setLink($link)
    {
        return $this->setData(self::LINK, $link);
    }

    /**
     * @inheritDoc
     */
    public function getOffer()
    {
        return $this->getData(self::OFFER);
    }

    /**
     * @inheritDoc
     */
    public function setOffer($offer)
    {
        return $this->setData(self::OFFER, $offer);
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

