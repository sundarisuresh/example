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
    public function getQueid()
    {
        return $this->getData(self::QUEID);
    }

    /**
     * @inheritDoc
     */
    public function setQueid($queid)
    {
        return $this->setData(self::QUEID, $queid);
    }

    /**
     * @inheritDoc
     */
    public function getCusid()
    {
        return $this->getData(self::CUSID);
    }

    /**
     * @inheritDoc
     */
    public function setCusid($cusid)
    {
        return $this->setData(self::CUSID, $cusid);
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

