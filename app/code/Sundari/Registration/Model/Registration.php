<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Registration\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Registration\Api\Data\RegistrationInterface;

class Registration extends AbstractModel implements RegistrationInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Registration\Model\ResourceModel\Registration::class);
    }

    /**
     * @inheritDoc
     */
    public function getRegistrationId()
    {
        return $this->getData(self::REGISTRATION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setRegistrationId($registrationId)
    {
        return $this->setData(self::REGISTRATION_ID, $registrationId);
    }

    /**
     * @inheritDoc
     */
    public function getDateofpurchase()
    {
        return $this->getData(self::DATEOFPURCHASE);
    }

    /**
     * @inheritDoc
     */
    public function setDateofpurchase($dateofpurchase)
    {
        return $this->setData(self::DATEOFPURCHASE, $dateofpurchase);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getEmailid()
    {
        return $this->getData(self::EMAILID);
    }

    /**
     * @inheritDoc
     */
    public function setEmailid($emailid)
    {
        return $this->setData(self::EMAILID, $emailid);
    }

    /**
     * @inheritDoc
     */
    public function getVendorname()
    {
        return $this->getData(self::VENDORNAME);
    }

    /**
     * @inheritDoc
     */
    public function setVendorname($vendorname)
    {
        return $this->setData(self::VENDORNAME, $vendorname);
    }

    /**
     * @inheritDoc
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * @inheritDoc
     */
    public function getProductserialno()
    {
        return $this->getData(self::PRODUCTSERIALNO);
    }

    /**
     * @inheritDoc
     */
    public function setProductserialno($productserialno)
    {
        return $this->setData(self::PRODUCTSERIALNO, $productserialno);
    }
}

