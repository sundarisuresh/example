<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Api\Data;

interface QaInterface
{

    const QUESTION = 'question';
    const PRODUCTID = 'productid';
    const DATE = 'date';
    const QA_ID = 'qa_id';
    const ANSWER = 'answer';
    const CUSTOMERID = 'customerid';

    /**
     * Get qa_id
     * @return string|null
     */
    public function getQaId();

    /**
     * Set qa_id
     * @param string $qaId
     * @return \Sundari\Pqa\Qa\Api\Data\QaInterface
     */
    public function setQaId($qaId);

    /**
     * Get question
     * @return string|null
     */
    public function getQuestion();

    /**
     * Set question
     * @param string $question
     * @return \Sundari\Pqa\Qa\Api\Data\QaInterface
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
     * @return \Sundari\Pqa\Qa\Api\Data\QaInterface
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
     * @return \Sundari\Pqa\Qa\Api\Data\QaInterface
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
     * @return \Sundari\Pqa\Qa\Api\Data\QaInterface
     */
    public function setProductid($productid);

    /**
     * Get date
     * @return string|null
     */
    public function getDate();

    /**
     * Set date
     * @param string $date
     * @return \Sundari\Pqa\Qa\Api\Data\QaInterface
     */
    public function setDate($date);
}

