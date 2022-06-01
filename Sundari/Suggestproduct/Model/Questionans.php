<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Suggestproduct\Api\Data\QuestionansInterface;

class Questionans extends AbstractModel implements QuestionansInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Suggestproduct\Model\ResourceModel\Questionans::class);
    }

    /**
     * @inheritDoc
     */
    public function getQuestionansId()
    {
        return $this->getData(self::QUESTIONANS_ID);
    }

    /**
     * @inheritDoc
     */
    public function setQuestionansId($questionansId)
    {
        return $this->setData(self::QUESTIONANS_ID, $questionansId);
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
    public function getOptiona()
    {
        return $this->getData(self::OPTIONA);
    }

    /**
     * @inheritDoc
     */
    public function setOptiona($optiona)
    {
        return $this->setData(self::OPTIONA, $optiona);
    }

    /**
     * @inheritDoc
     */
    public function getOptionb()
    {
        return $this->getData(self::OPTIONB);
    }

    /**
     * @inheritDoc
     */
    public function setOptionb($optionb)
    {
        return $this->setData(self::OPTIONB, $optionb);
    }

    /**
     * @inheritDoc
     */
    public function getOptionc()
    {
        return $this->getData(self::OPTIONC);
    }

    /**
     * @inheritDoc
     */
    public function setOptionc($optionc)
    {
        return $this->setData(self::OPTIONC, $optionc);
    }

    /**
     * @inheritDoc
     */
    public function getOptiond()
    {
        return $this->getData(self::OPTIOND);
    }

    /**
     * @inheritDoc
     */
    public function setOptiond($optiond)
    {
        return $this->setData(self::OPTIOND, $optiond);
    }
}

