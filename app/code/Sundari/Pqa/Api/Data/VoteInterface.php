<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Api\Data;

interface VoteInterface
{

    const UP = 'up';
    const VOTE_ID = 'vote_id';
    const CUSTOMERID = 'customerid';
    const QUESTIONID = 'questionid';
    const DOWN = 'down';

    /**
     * Get vote_id
     * @return string|null
     */
    public function getVoteId();

    /**
     * Set vote_id
     * @param string $voteId
     * @return \Sundari\Pqa\Vote\Api\Data\VoteInterface
     */
    public function setVoteId($voteId);

    /**
     * Get questionid
     * @return string|null
     */
    public function getQuestionid();

    /**
     * Set questionid
     * @param string $questionid
     * @return \Sundari\Pqa\Vote\Api\Data\VoteInterface
     */
    public function setQuestionid($questionid);

    /**
     * Get customerid
     * @return string|null
     */
    public function getCustomerid();

    /**
     * Set customerid
     * @param string $customerid
     * @return \Sundari\Pqa\Vote\Api\Data\VoteInterface
     */
    public function setCustomerid($customerid);

    /**
     * Get up
     * @return string|null
     */
    public function getUp();

    /**
     * Set up
     * @param string $up
     * @return \Sundari\Pqa\Vote\Api\Data\VoteInterface
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
     * @return \Sundari\Pqa\Vote\Api\Data\VoteInterface
     */
    public function setDown($down);
}

