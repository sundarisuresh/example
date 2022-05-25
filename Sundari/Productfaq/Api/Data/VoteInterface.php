<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Api\Data;

interface VoteInterface
{

    const QUEID = 'queid';
    const UP = 'up';
    const CUSID = 'cusid';
    const VOTE_ID = 'vote_id';
    const DOWN = 'down';

    /**
     * Get vote_id
     * @return string|null
     */
    public function getVoteId();

    /**
     * Set vote_id
     * @param string $voteId
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
     */
    public function setVoteId($voteId);

    /**
     * Get queid
     * @return string|null
     */
    public function getQueid();

    /**
     * Set queid
     * @param string $queid
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
     */
    public function setQueid($queid);

    /**
     * Get cusid
     * @return string|null
     */
    public function getCusid();

    /**
     * Set cusid
     * @param string $cusid
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
     */
    public function setCusid($cusid);

    /**
     * Get up
     * @return string|null
     */
    public function getUp();

    /**
     * Set up
     * @param string $up
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
     */
    public function setUp($up);

    /**
     * Get down
     * @return string|null
     */
    public function getDown();

    /**
     * Set down
     * @param string $down
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
     */
    public function setDown($down);
}

