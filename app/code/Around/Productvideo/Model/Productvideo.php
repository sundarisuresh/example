<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productvideo\Model;

use Around\Productvideo\Api\Data\ProductvideoInterface;
use Magento\Framework\Model\AbstractModel;

class Productvideo extends AbstractModel implements ProductvideoInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Around\Productvideo\Model\ResourceModel\Productvideo::class);
    }

    /**
     * @inheritDoc
     */
    public function getProductvideoId()
    {
        return $this->getData(self::PRODUCTVIDEO_ID);
    }

    /**
     * @inheritDoc
     */
    public function setProductvideoId($productvideoId)
    {
        return $this->setData(self::PRODUCTVIDEO_ID, $productvideoId);
    }

    /**
     * @inheritDoc
     */
    public function getProductsku()
    {
        return $this->getData(self::PRODUCTSKU);
    }

    /**
     * @inheritDoc
     */
    public function setProductsku($productsku)
    {
        return $this->setData(self::PRODUCTSKU, $productsku);
    }

    /**
     * @inheritDoc
     */
    public function getVideosource()
    {
        return $this->getData(self::VIDEOSOURCE);
    }

    /**
     * @inheritDoc
     */
    public function setVideosource($videosource)
    {
        return $this->setData(self::VIDEOSOURCE, $videosource);
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

    /**
     * @inheritDoc
     */
    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    /**
     * @inheritDoc
     */
    public function setType($type)
    {
        return $this->setData(self::TYPE, $type);
    }

    /**
     * @inheritDoc
     */
    public function getLength()
    {
        return $this->getData(self::LENGTH);
    }

    /**
     * @inheritDoc
     */
    public function setLength($length)
    {
        return $this->setData(self::LENGTH, $length);
    }

    /**
     * @inheritDoc
     */
    public function getPreview()
    {
        return $this->getData(self::PREVIEW);
    }

    /**
     * @inheritDoc
     */
    public function setPreview($preview)
    {
        return $this->setData(self::PREVIEW, $preview);
    }
}

