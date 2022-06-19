<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Registration\Api\Data;

interface RegistrationInterface
{

    const EMAILID = 'emailid';
    const VENDORNAME = 'vendorname';
    const NAME = 'name';
    const REGISTRATION_ID = 'registration_id';
    const PRODUCTSERIALNO = 'productserialno';
    const DATEOFPURCHASE = 'dateofpurchase';
    const ADDRESS = 'address';

    /**
     * Get registration_id
     * @return string|null
     */
    public function getRegistrationId();

    /**
     * Set registration_id
     * @param string $registrationId
     * @return \Sundari\Registration\Registration\Api\Data\RegistrationInterface
     */
    public function setRegistrationId($registrationId);

    /**
     * Get dateofpurchase
     * @return string|null
     */
    public function getDateofpurchase();

    /**
     * Set dateofpurchase
     * @param string $dateofpurchase
     * @return \Sundari\Registration\Registration\Api\Data\RegistrationInterface
     */
    public function setDateofpurchase($dateofpurchase);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Sundari\Registration\Registration\Api\Data\RegistrationInterface
     */
    public function setName($name);

    /**
     * Get emailid
     * @return string|null
     */
    public function getEmailid();

    /**
     * Set emailid
     * @param string $emailid
     * @return \Sundari\Registration\Registration\Api\Data\RegistrationInterface
     */
    public function setEmailid($emailid);

    /**
     * Get vendorname
     * @return string|null
     */
    public function getVendorname();

    /**
     * Set vendorname
     * @param string $vendorname
     * @return \Sundari\Registration\Registration\Api\Data\RegistrationInterface
     */
    public function setVendorname($vendorname);

    /**
     * Get address
     * @return string|null
     */
    public function getAddress();

    /**
     * Set address
     * @param string $address
     * @return \Sundari\Registration\Registration\Api\Data\RegistrationInterface
     */
    public function setAddress($address);

    /**
     * Get productserialno
     * @return string|null
     */
    public function getProductserialno();

    /**
     * Set productserialno
     * @param string $productserialno
     * @return \Sundari\Registration\Registration\Api\Data\RegistrationInterface
     */
    public function setProductserialno($productserialno);
}

