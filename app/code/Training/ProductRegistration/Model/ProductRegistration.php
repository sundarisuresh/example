<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Training\ProductRegistration\Model;

use Magento\Framework\Model\AbstractModel;
use Training\ProductRegistration\Api\Data\ProductRegistrationInterface;

class ProductRegistration extends AbstractModel implements ProductRegistrationInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Training\ProductRegistration\Model\ResourceModel\ProductRegistration::class);
    }

    /**
     * @inheritDoc
     */
    public function getProductregistrationId()
    {
        return $this->getData(self::PRODUCTREGISTRATION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setProductregistrationId($productregistrationId)
    {
        return $this->setData(self::PRODUCTREGISTRATION_ID, $productregistrationId);
    }

    /**
     * @inheritDoc
     */
    public function getDop()
    {
        return $this->getData(self::DOP);
    }

    /**
     * @inheritDoc
     */
    public function setDop($dop)
    {
        return $this->setData(self::DOP, $dop);
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
    public function getSku()
    {
        return $this->getData(self::SKU);
    }

    /**
     * @inheritDoc
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * @inheritDoc
     */
    public function getContactno()
    {
        return $this->getData(self::CONTACTNO);
    }

    /**
     * @inheritDoc
     */
    public function setContactno($contactno)
    {
        return $this->setData(self::CONTACTNO, $contactno);
    }

    /**
     * @inheritDoc
     */
    public function getVendor()
    {
        return $this->getData(self::VENDOR);
    }

    /**
     * @inheritDoc
     */
    public function setVendor($vendor)
    {
        return $this->setData(self::VENDOR, $vendor);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
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
}

