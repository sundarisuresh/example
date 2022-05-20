<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Pqa\Api\Data\QaInterface;

class Qa extends AbstractModel implements QaInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Pqa\Model\ResourceModel\Qa::class);
    }

    /**
     * @inheritDoc
     */
    public function getQaId()
    {
        return $this->getData(self::QA_ID);
    }

    /**
     * @inheritDoc
     */
    public function setQaId($qaId)
    {
        return $this->setData(self::QA_ID, $qaId);
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

