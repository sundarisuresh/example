<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Productfaq\Api\Data\FaqInterface;

class Faq extends AbstractModel implements FaqInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Productfaq\Model\ResourceModel\Faq::class);
    }

    /**
     * @inheritDoc
     */
    public function getFaqId()
    {
        return $this->getData(self::FAQ_ID);
    }

    /**
     * @inheritDoc
     */
    public function setFaqId($faqId)
    {
        return $this->setData(self::FAQ_ID, $faqId);
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
    public function getAgree()
    {
        return $this->getData(self::AGREE);
    }

    /**
     * @inheritDoc
     */
    public function setAgree($agree)
    {
        return $this->setData(self::AGREE, $agree);
    }

    /**
     * @inheritDoc
     */
    public function getDisagree()
    {
        return $this->getData(self::DISAGREE);
    }

    /**
     * @inheritDoc
     */
    public function setDisagree($disagree)
    {
        return $this->setData(self::DISAGREE, $disagree);
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

