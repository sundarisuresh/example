<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace StageBit\SignupSheet\Model;

use Magento\Framework\Model\AbstractModel;
use StageBit\SignupSheet\Api\Data\SignupSheetInterface;

class SignupSheet extends AbstractModel implements SignupSheetInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\StageBit\SignupSheet\Model\ResourceModel\SignupSheet::class);
    }

    /**
     * @inheritDoc
     */
    public function getSignupsheetId()
    {
        return $this->getData(self::SIGNUPSHEET_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSignupsheetId($signupsheetId)
    {
        return $this->setData(self::SIGNUPSHEET_ID, $signupsheetId);
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
    public function getDate()
    {
        return $this->getData(self::DATE);
    }

    /**
     * @inheritDoc
     */
    public function setDate($date)
    {
        return $this->setData(self::DATE, $date);
    }
}

