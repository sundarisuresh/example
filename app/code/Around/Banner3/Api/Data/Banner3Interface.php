<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner3\Api\Data;

interface Banner3Interface
{

    const ENABLE = 'enable';
    const BANNER3_ID = 'banner3_id';
    const ALTNAME = 'altname';
    const SORTORDER = 'sortorder';
    const IMAGE = 'image';
    const LINK = 'link';

    /**
     * Get banner3_id
     * @return string|null
     */
    public function getBanner3Id();

    /**
     * Set banner3_id
     * @param string $banner3Id
     * @return \Around\Banner3\Banner3\Api\Data\Banner3Interface
     */
    public function setBanner3Id($banner3Id);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Around\Banner3\Banner3\Api\Data\Banner3Interface
     */
    public function setImage($image);

    /**
     * Get link
     * @return string|null
     */
    public function getLink();

    /**
     * Set link
     * @param string $link
     * @return \Around\Banner3\Banner3\Api\Data\Banner3Interface
     */
    public function setLink($link);

    /**
     * Get altname
     * @return string|null
     */
    public function getAltname();

    /**
     * Set altname
     * @param string $altname
     * @return \Around\Banner3\Banner3\Api\Data\Banner3Interface
     */
    public function setAltname($altname);

    /**
     * Get sortorder
     * @return string|null
     */
    public function getSortorder();

    /**
     * Set sortorder
     * @param string $sortorder
     * @return \Around\Banner3\Banner3\Api\Data\Banner3Interface
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
     * @return \Around\Banner3\Banner3\Api\Data\Banner3Interface
     */
    public function setEnable($enable);
}

