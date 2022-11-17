<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Productvideo\Api\Data;

interface ProductvideoInterface
{

    const ENABLE = 'enable';
    const TYPE = 'type';
    const VIDEOSOURCE = 'videosource';
    const SORTORDER = 'sortorder';
    const PRODUCTVIDEO_ID = 'productvideo_id';
    const PRODUCTSKU = 'productsku';
    const LENGTH = 'length';
    const PREVIEW = 'preview';

    /**
     * Get productvideo_id
     * @return string|null
     */
    public function getProductvideoId();

    /**
     * Set productvideo_id
     * @param string $productvideoId
     * @return \Around\Productvideo\Productvideo\Api\Data\ProductvideoInterface
     */
    public function setProductvideoId($productvideoId);

    /**
     * Get productsku
     * @return string|null
     */
    public function getProductsku();

    /**
     * Set productsku
     * @param string $productsku
     * @return \Around\Productvideo\Productvideo\Api\Data\ProductvideoInterface
     */
    public function setProductsku($productsku);

    /**
     * Get videosource
     * @return string|null
     */
    public function getVideosource();

    /**
     * Set videosource
     * @param string $videosource
     * @return \Around\Productvideo\Productvideo\Api\Data\ProductvideoInterface
     */
    public function setVideosource($videosource);

    /**
     * Get sortorder
     * @return string|null
     */
    public function getSortorder();

    /**
     * Set sortorder
     * @param string $sortorder
     * @return \Around\Productvideo\Productvideo\Api\Data\ProductvideoInterface
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
     * @return \Around\Productvideo\Productvideo\Api\Data\ProductvideoInterface
     */
    public function setEnable($enable);

    /**
     * Get type
     * @return string|null
     */
    public function getType();

    /**
     * Set type
     * @param string $type
     * @return \Around\Productvideo\Productvideo\Api\Data\ProductvideoInterface
     */
    public function setType($type);

    /**
     * Get length
     * @return string|null
     */
    public function getLength();

    /**
     * Set length
     * @param string $length
     * @return \Around\Productvideo\Productvideo\Api\Data\ProductvideoInterface
     */
    public function setLength($length);

    /**
     * Get preview
     * @return string|null
     */
    public function getPreview();

    /**
     * Set preview
     * @param string $preview
     * @return \Around\Productvideo\Productvideo\Api\Data\ProductvideoInterface
     */
    public function setPreview($preview);
}

