<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner3\Model;

use Around\Banner3\Api\Data\Banner3Interface;
use Magento\Framework\Model\AbstractModel;

class Banner3 extends AbstractModel implements Banner3Interface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\Banner3\Model\ResourceModel\Banner3::class);
    }

    /**
     * @inheritDoc
     */
    public function getBanner3Id()
    {
        return $this->getData(self::BANNER3_ID);
    }

    /**
     * @inheritDoc
     */
    public function setBanner3Id($banner3Id)
    {
        return $this->setData(self::BANNER3_ID, $banner3Id);
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

