<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Emical\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Emical\Api\Data\EmiInterface;

class Emi extends AbstractModel implements EmiInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Emical\Model\ResourceModel\Emi::class);
    }

    /**
     * @inheritDoc
     */
    public function getEmiId()
    {
        return $this->getData(self::EMI_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEmiId($emiId)
    {
        return $this->setData(self::EMI_ID, $emiId);
    }

    /**
     * @inheritDoc
     */
    public function getMonth()
    {
        return $this->getData(self::MONTH);
    }

    /**
     * @inheritDoc
     */
    public function setMonth($month)
    {
        return $this->setData(self::MONTH, $month);
    }

    /**
     * @inheritDoc
     */
    public function getInterest()
    {
        return $this->getData(self::INTEREST);
    }

    /**
     * @inheritDoc
     */
    public function setInterest($interest)
    {
        return $this->setData(self::INTEREST, $interest);
    }

    /**
     * @inheritDoc
     */
    public function getGender()
    {
        return $this->getData(self::GENDER);
    }

    /**
     * @inheritDoc
     */
    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
    }
}

