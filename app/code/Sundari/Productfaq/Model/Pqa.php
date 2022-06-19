<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Productfaq\Api\Data\PqaInterface;

class Pqa extends AbstractModel implements PqaInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Productfaq\Model\ResourceModel\Pqa::class);
    }

    /**
     * @inheritDoc
     */
    public function getPqaId()
    {
        return $this->getData(self::PQA_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPqaId($pqaId)
    {
        return $this->setData(self::PQA_ID, $pqaId);
    }

    /**
     * @inheritDoc
     */
    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion($question)
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * @inheritDoc
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * @inheritDoc
     */
    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerid()
    {
        return $this->getData(self::CUSTOMERID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerid($customerid)
    {
        return $this->setData(self::CUSTOMERID, $customerid);
    }

    /**
     * @inheritDoc
     */
    public function getProductid()
    {
        return $this->getData(self::PRODUCTID);
    }

    /**
     * @inheritDoc
     */
    public function setProductid($productid)
    {
        return $this->setData(self::PRODUCTID, $productid);
    }

    /**
     * @inheritDoc
     */
    public function getDateandtime()
    {
        return $this->getData(self::DATEANDTIME);
    }

    /**
     * @inheritDoc
     */
    public function setDateandtime($dateandtime)
    {
        return $this->setData(self::DATEANDTIME, $dateandtime);
    }
}

