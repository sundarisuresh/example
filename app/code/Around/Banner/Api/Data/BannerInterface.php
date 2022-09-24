<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Banner\Api\Data;

interface BannerInterface
{

    const BANNER_ID = 'banner_id';
    const SORTORDER = 'sortorder';
    const ALTTEXT = 'alttext';
    const IMAGE = 'image';
    const LINK = 'link';

    /**
     * Get banner_id
     * @return string|null
     */
    public function getBannerId();

    /**
     * Set banner_id
     * @param string $bannerId
     * @return \Around\Banner\Banner\Api\Data\BannerInterface
     */
    public function setBannerId($bannerId);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Around\Banner\Banner\Api\Data\BannerInterface
     */
    public function setImage($image);

    /**
     * Get sortorder
     * @return string|null
     */
    public function getSortorder();

    /**
     * Set sortorder
     * @param string $sortorder
     * @return \Around\Banner\Banner\Api\Data\BannerInterface
     */
    public function setSortorder($sortorder);

    /**
     * Get alttext
     * @return string|null
     */
    public function getAlttext();

    /**
     * Set alttext
     * @param string $alttext
     * @return \Around\Banner\Banner\Api\Data\BannerInterface
     */
    public function setAlttext($alttext);

    /**
     * Get link
     * @return string|null
     */
    public function getLink();

    /**
     * Set link
     * @param string $link
     * @return \Around\Banner\Banner\Api\Data\BannerInterface
     */
    public function setLink($link);
}

