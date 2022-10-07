<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner2\Api\Data;

interface Banner2Interface
{

    const ENABLE = 'enable';
    const ALTNAME = 'altname';
    const SORTORDER = 'sortorder';
    const BANNER2_ID = 'banner2_id';
    const IMAGE = 'image';
    const LINK = 'link';

    /**
     * Get banner2_id
     * @return string|null
     */
    public function getBanner2Id();

    /**
     * Set banner2_id
     * @param string $banner2Id
     * @return \Around\Banner2\Banner2\Api\Data\Banner2Interface
     */
    public function setBanner2Id($banner2Id);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Around\Banner2\Banner2\Api\Data\Banner2Interface
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
     * @return \Around\Banner2\Banner2\Api\Data\Banner2Interface
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
     * @return \Around\Banner2\Banner2\Api\Data\Banner2Interface
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
     * @return \Around\Banner2\Banner2\Api\Data\Banner2Interface
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
     * @return \Around\Banner2\Banner2\Api\Data\Banner2Interface
     */
    public function setEnable($enable);
}

