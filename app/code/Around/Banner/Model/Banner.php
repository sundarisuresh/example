<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner\Model;

use Around\Banner\Api\Data\BannerInterface;
use Magento\Framework\Model\AbstractModel;

class Banner extends AbstractModel implements BannerInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\Banner\Model\ResourceModel\Banner::class);
    }

    /**
     * @inheritDoc
     */
    public function getBannerId()
    {
        return $this->getData(self::BANNER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setBannerId($bannerId)
    {
        return $this->setData(self::BANNER_ID, $bannerId);
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
    public function getAlttext()
    {
        return $this->getData(self::ALTTEXT);
    }

    /**
     * @inheritDoc
     */
    public function setAlttext($alttext)
    {
        return $this->setData(self::ALTTEXT, $alttext);
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
}

