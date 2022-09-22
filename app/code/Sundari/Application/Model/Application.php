<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Application\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Application\Api\Data\ApplicationInterface;

class Application extends AbstractModel implements ApplicationInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Application\Model\ResourceModel\Application::class);
    }

    /**
     * @inheritDoc
     */
    public function getApplicationId()
    {
        return $this->getData(self::APPLICATION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setApplicationId($applicationId)
    {
        return $this->setData(self::APPLICATION_ID, $applicationId);
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
}

