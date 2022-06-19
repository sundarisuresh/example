<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Api\Data;

interface PqaInterface
{

    const QUESTION = 'question';
    const PRODUCTID = 'productid';
    const DATEANDTIME = 'dateandtime';
    const ANSWER = 'answer';
    const CUSTOMERID = 'customerid';
    const PQA_ID = 'pqa_id';

    /**
     * Get pqa_id
     * @return string|null
     */
    public function getPqaId();

    /**
     * Set pqa_id
     * @param string $pqaId
     * @return \Sundari\Productfaq\Pqa\Api\Data\PqaInterface
     */
    public function setPqaId($pqaId);

    /**
     * Get question
     * @return string|null
     */
    public function getQuestion();

    /**
     * Set question
     * @param string $question
     * @return \Sundari\Productfaq\Pqa\Api\Data\PqaInterface
     */
    public function setQuestion($question);

    /**
     * Get answer
     * @return string|null
     */
    public function getAnswer();

    /**
     * Set answer
     * @param string $answer
     * @return \Sundari\Productfaq\Pqa\Api\Data\PqaInterface
     */
    public function setAnswer($answer);

    /**
     * Get customerid
     * @return string|null
     */
    public function getCustomerid();

    /**
     * Set customerid
     * @param string $customerid
     * @return \Sundari\Productfaq\Pqa\Api\Data\PqaInterface
     */
    public function setCustomerid($customerid);

    /**
     * Get productid
     * @return string|null
     */
    public function getProductid();

    /**
     * Set productid
     * @param string $productid
     * @return \Sundari\Productfaq\Pqa\Api\Data\PqaInterface
     */
    public function setProductid($productid);

    /**
     * Get dateandtime
     * @return string|null
     */
    public function getDateandtime();

    /**
     * Set dateandtime
     * @param string $dateandtime
     * @return \Sundari\Productfaq\Pqa\Api\Data\PqaInterface
     */
    public function setDateandtime($dateandtime);
}

