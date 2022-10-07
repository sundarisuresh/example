<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Category2\Api\Data;

interface Category2Interface
{

    const ENABLE = 'enable';
    const NAME = 'name';
    const ALTNAME = 'altname';
    const SORTORDER = 'sortorder';
    const CATEGORY2_ID = 'category2_id';
    const IMAGE = 'image';
    const OFFER = 'offer';
    const LINK = 'link';

    /**
     * Get category2_id
     * @return string|null
     */
    public function getCategory2Id();

    /**
     * Set category2_id
     * @param string $category2Id
     * @return \Around\Category2\Category2\Api\Data\Category2Interface
     */
    public function setCategory2Id($category2Id);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Around\Category2\Category2\Api\Data\Category2Interface
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
     * @return \Around\Category2\Category2\Api\Data\Category2Interface
     */
    public function setLink($link);

    /**
     * Get sortorder
     * @return string|null
     */
    public function getSortorder();

    /**
     * Set sortorder
     * @param string $sortorder
     * @return \Around\Category2\Category2\Api\Data\Category2Interface
     */
    public function setSortorder($sortorder);

    /**
     * Get altname
     * @return string|null
     */
    public function getAltname();

    /**
     * Set altname
     * @param string $altname
     * @return \Around\Category2\Category2\Api\Data\Category2Interface
     */
    public function setAltname($altname);

    /**
     * Get enable
     * @return string|null
     */
    public function getEnable();

    /**
     * Set enable
     * @param string $enable
     * @return \Around\Category2\Category2\Api\Data\Category2Interface
     */
    public function setEnable($enable);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Around\Category2\Category2\Api\Data\Category2Interface
     */
    public function setName($name);

    /**
     * Get offer
     * @return string|null
     */
    public function getOffer();

    /**
     * Set offer
     * @param string $offer
     * @return \Around\Category2\Category2\Api\Data\Category2Interface
     */
    public function setOffer($offer);
}

