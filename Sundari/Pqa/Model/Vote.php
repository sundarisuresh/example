<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Pqa\Api\Data\VoteInterface;

class Vote extends AbstractModel implements VoteInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Pqa\Model\ResourceModel\Vote::class);
    }

    /**
     * @inheritDoc
     */
    public function getVoteId()
    {
        return $this->getData(self::VOTE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setVoteId($voteId)
    {
        return $this->setData(self::VOTE_ID, $voteId);
    }

    /**
     * @inheritDoc
     */
    public function getQuestionid()
    {
        return $this->getData(self::QUESTIONID);
    }

    /**
     * @inheritDoc
     */
    public function setQuestionid($questionid)
    {
        return $this->setData(self::QUESTIONID, $questionid);
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
    public function getUp()
    {
        return $this->getData(self::UP);
    }

    /**
     * @inheritDoc
     */
    public function setUp($up)
    {
        return $this->setData(self::UP, $up);
    }

    /**
     * @inheritDoc
     */
    public function getDown()
    {
        return $this->getData(self::DOWN);
    }

    /**
     * @inheritDoc
     */
    public function setDown($down)
    {
        return $this->setData(self::DOWN, $down);
    }
}

