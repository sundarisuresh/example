<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Category2\Model;

use Around\Category2\Api\Data\Category2Interface;
use Magento\Framework\Model\AbstractModel;

class Category2 extends AbstractModel implements Category2Interface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\Category2\Model\ResourceModel\Category2::class);
    }

    /**
     * @inheritDoc
     */
    public function getCategory2Id()
    {
        return $this->getData(self::CATEGORY2_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCategory2Id($category2Id)
    {
        return $this->setData(self::CATEGORY2_ID, $category2Id);
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
    public function getAltname()
    {
        return $this->getData(self::ALTNAME);
    }

    /**
     * @inheritDoc
     */
    public function setAltname($altname)
    {
        return $this->setData(self::ALTNAME, $altname);
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
}

