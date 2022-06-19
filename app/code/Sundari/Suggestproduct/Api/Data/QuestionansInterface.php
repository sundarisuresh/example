<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Api\Data;

interface QuestionansInterface
{

    const QUESTION = 'question';
    const OPTIOND = 'optiond';
    const QUESTIONANS_ID = 'questionans_id';
    const OPTIONA = 'optiona';
    const OPTIONB = 'optionb';
    const OPTIONC = 'optionc';

    /**
     * Get questionans_id
     * @return string|null
     */
    public function getQuestionansId();

    /**
     * Set questionans_id
     * @param string $questionansId
     * @return \Sundari\Suggestproduct\Questionans\Api\Data\QuestionansInterface
     */
    public function setQuestionansId($questionansId);

    /**
     * Get question
     * @return string|null
     */
    public function getQuestion();

    /**
     * Set question
     * @param string $question
     * @return \Sundari\Suggestproduct\Questionans\Api\Data\QuestionansInterface
     */
    public function setQuestion($question);

    /**
     * Get optiona
     * @return string|null
     */
    public function getOptiona();

    /**
     * Set optiona
     * @param string $optiona
     * @return \Sundari\Suggestproduct\Questionans\Api\Data\QuestionansInterface
     */
    public function setOptiona($optiona);

    /**
     * Get optionb
     * @return string|null
     */
    public function getOptionb();

    /**
     * Set optionb
     * @param string $optionb
     * @return \Sundari\Suggestproduct\Questionans\Api\Data\QuestionansInterface
     */
    public function setOptionb($optionb);

    /**
     * Get optionc
     * @return string|null
     */
    public function getOptionc();

    /**
     * Set optionc
     * @param string $optionc
     * @return \Sundari\Suggestproduct\Questionans\Api\Data\QuestionansInterface
     */
    public function setOptionc($optionc);

    /**
     * Get optiond
     * @return string|null
     */
    public function getOptiond();

    /**
     * Set optiond
     * @param string $optiond
     * @return \Sundari\Suggestproduct\Questionans\Api\Data\QuestionansInterface
     */
    public function setOptiond($optiond);
}

