<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\ProductRegistration\Api\Data;

interface ProductRegistrationInterface
{

    const PRODUCTREGISTRATION_ID = 'productregistration_id';
    const EMAIL = 'email';
    const NAME = 'name';
    const CONTACTNO = 'contactno';
    const SKU = 'sku';
    const DOP = 'dop';
    const VENDOR = 'vendor';
    const ADDRESS = 'address';

    /**
     * Get productregistration_id
     * @return string|null
     */
    public function getProductregistrationId();

    /**
     * Set productregistration_id
     * @param string $productregistrationId
     * @return \Training\ProductRegistration\ProductRegistration\Api\Data\ProductRegistrationInterface
     */
    public function setProductregistrationId($productregistrationId);

    /**
     * Get dop
     * @return string|null
     */
    public function getDop();

    /**
     * Set dop
     * @param string $dop
     * @return \Training\ProductRegistration\ProductRegistration\Api\Data\ProductRegistrationInterface
     */
    public function setDop($dop);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Training\ProductRegistration\ProductRegistration\Api\Data\ProductRegistrationInterface
     */
    public function setName($name);

    /**
     * Get sku
     * @return string|null
     */
    public function getSku();

    /**
     * Set sku
     * @param string $sku
     * @return \Training\ProductRegistration\ProductRegistration\Api\Data\ProductRegistrationInterface
     */
    public function setSku($sku);

    /**
     * Get contactno
     * @return string|null
     */
    public function getContactno();

    /**
     * Set contactno
     * @param string $contactno
     * @return \Training\ProductRegistration\ProductRegistration\Api\Data\ProductRegistrationInterface
     */
    public function setContactno($contactno);

    /**
     * Get vendor
     * @return string|null
     */
    public function getVendor();

    /**
     * Set vendor
     * @param string $vendor
     * @return \Training\ProductRegistration\ProductRegistration\Api\Data\ProductRegistrationInterface
     */
    public function setVendor($vendor);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Training\ProductRegistration\ProductRegistration\Api\Data\ProductRegistrationInterface
     */
    public function setEmail($email);

    /**
     * Get address
     * @return string|null
     */
    public function getAddress();

    /**
     * Set address
     * @param string $address
     * @return \Training\ProductRegistration\ProductRegistration\Api\Data\ProductRegistrationInterface
     */
    public function setAddress($address);
}

