<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner2\Model;

use Around\Banner2\Api\Data\Banner2Interface;
use Magento\Framework\Model\AbstractModel;

class Banner2 extends AbstractModel implements Banner2Interface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\Banner2\Model\ResourceModel\Banner2::class);
    }

    /**
     * @inheritDoc
     */
    public function getBanner2Id()
    {
        return $this->getData(self::BANNER2_ID);
    }

    /**
     * @inheritDoc
     */
    public function setBanner2Id($banner2Id)
    {
        return $this->setData(self::BANNER2_ID, $banner2Id);
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

