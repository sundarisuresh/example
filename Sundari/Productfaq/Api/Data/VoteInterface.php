<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Api\Data;

interface VoteInterface
{

    const QUESTIONID = 'questionid';
    const VOTE_ID = 'vote_id';
    const CUSTOMERID = 'customerid';
    const UPVOTE = 'upvote';
    const DOWNVOTE = 'downvote';

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
     * Get questionid
     * @return string|null
     */
    public function getQuestionid();

    /**
     * Set questionid
     * @param string $questionid
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
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
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
     */
    public function setCustomerid($customerid);

    /**
     * Get upvote
     * @return string|null
     */
    public function getUpvote();

    /**
     * Set upvote
     * @param string $upvote
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
     */
    public function setUpvote($upvote);

    /**
     * Get downvote
     * @return string|null
     */
    public function getDownvote();

    /**
     * Set downvote
     * @param string $downvote
     * @return \Sundari\Productfaq\Vote\Api\Data\VoteInterface
     */
    public function setDownvote($downvote);
}

