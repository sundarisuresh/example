<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Itemcategory\Api\Data;

interface ItemcategoryInterface
{

    const ENABLE = 'enable';
    const NAME = 'name';
    const ITEMCATEGORY_ID = 'itemcategory_id';
    const SORTORDER = 'sortorder';
    const IMAGE = 'image';
    const OFFER = 'offer';
    const LINK = 'link';

    /**
     * Get itemcategory_id
     * @return string|null
     */
    public function getItemcategoryId();

    /**
     * Set itemcategory_id
     * @param string $itemcategoryId
     * @return \Around\Itemcategory\Itemcategory\Api\Data\ItemcategoryInterface
     */
    public function setItemcategoryId($itemcategoryId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Around\Itemcategory\Itemcategory\Api\Data\ItemcategoryInterface
     */
    public function setName($name);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Around\Itemcategory\Itemcategory\Api\Data\ItemcategoryInterface
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
     * @return \Around\Itemcategory\Itemcategory\Api\Data\ItemcategoryInterface
     */
    public function setSortorder($sortorder);

    /**
     * Get link
     * @return string|null
     */
    public function getLink();

    /**
     * Set link
     * @param string $link
     * @return \Around\Itemcategory\Itemcategory\Api\Data\ItemcategoryInterface
     */
    public function setLink($link);

    /**
     * Get offer
     * @return string|null
     */
    public function getOffer();

    /**
     * Set offer
     * @param string $offer
     * @return \Around\Itemcategory\Itemcategory\Api\Data\ItemcategoryInterface
     */
    public function setOffer($offer);

    /**
     * Get enable
     * @return string|null
     */
    public function getEnable();

    /**
     * Set enable
     * @param string $enable
     * @return \Around\Itemcategory\Itemcategory\Api\Data\ItemcategoryInterface
     */
    public function setEnable($enable);
}

