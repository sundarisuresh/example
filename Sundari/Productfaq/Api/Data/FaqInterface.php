<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Api\Data;

interface FaqInterface
{

    const QUESTION = 'question';
    const PRODUCTID = 'productid';
    const AGREE = 'agree';
    const ANSWER = 'answer';
    const DATEANDTIME = 'dateandtime';
    const CUSTOMERID = 'customerid';
    const DISAGREE = 'disagree';
    const FAQ_ID = 'faq_id';

    /**
     * Get faq_id
     * @return string|null
     */
    public function getFaqId();

    /**
     * Set faq_id
     * @param string $faqId
     * @return \Sundari\Productfaq\Faq\Api\Data\FaqInterface
     */
    public function setFaqId($faqId);

    /**
     * Get question
     * @return string|null
     */
    public function getQuestion();

    /**
     * Set question
     * @param string $question
     * @return \Sundari\Productfaq\Faq\Api\Data\FaqInterface
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
     * @return \Sundari\Productfaq\Faq\Api\Data\FaqInterface
     */
    public function setAnswer($answer);

    /**
     * Get productid
     * @return string|null
     */
    public function getProductid();

    /**
     * Set productid
     * @param string $productid
     * @return \Sundari\Productfaq\Faq\Api\Data\FaqInterface
     */
    public function setProductid($productid);

    /**
     * Get agree
     * @return string|null
     */
    public function getAgree();

    /**
     * Set agree
     * @param string $agree
     * @return \Sundari\Productfaq\Faq\Api\Data\FaqInterface
     */
    public function setAgree($agree);

    /**
     * Get disagree
     * @return string|null
     */
    public function getDisagree();

    /**
     * Set disagree
     * @param string $disagree
     * @return \Sundari\Productfaq\Faq\Api\Data\FaqInterface
     */
    public function setDisagree($disagree);

    /**
     * Get customerid
     * @return string|null
     */
    public function getCustomerid();

    /**
     * Set customerid
     * @param string $customerid
     * @return \Sundari\Productfaq\Faq\Api\Data\FaqInterface
     */
    public function setCustomerid($customerid);

    /**
     * Get dateandtime
     * @return string|null
     */
    public function getDateandtime();

    /**
     * Set dateandtime
     * @param string $dateandtime
     * @return \Sundari\Productfaq\Faq\Api\Data\FaqInterface
     */
    public function setDateandtime($dateandtime);
}

