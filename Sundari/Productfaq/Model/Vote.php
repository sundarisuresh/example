<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Productfaq\Api\Data\VoteInterface;

class Vote extends AbstractModel implements VoteInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Productfaq\Model\ResourceModel\Vote::class);
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
    public function getUpvote()
    {
        return $this->getData(self::UPVOTE);
    }

    /**
     * @inheritDoc
     */
    public function setUpvote($upvote)
    {
        return $this->setData(self::UPVOTE, $upvote);
    }

    /**
     * @inheritDoc
     */
    public function getDownvote()
    {
        return $this->getData(self::DOWNVOTE);
    }

    /**
     * @inheritDoc
     */
    public function setDownvote($downvote)
    {
        return $this->setData(self::DOWNVOTE, $downvote);
    }
}

