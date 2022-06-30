<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Api\Data;

interface RuleInterface
{

    const PRODUCT = 'product';
    const ANSWER2 = 'answer2';
    const RULE_ID = 'rule_id';
    const ANSWER1 = 'answer1';

    /**
     * Get rule_id
     * @return string|null
     */
    public function getRuleId();

    /**
     * Set rule_id
     * @param string $ruleId
     * @return \Sundari\Suggestproduct\Rule\Api\Data\RuleInterface
     */
    public function setRuleId($ruleId);

    /**
     * Get answer1
     * @return string|null
     */
    public function getAnswer1();

    /**
     * Set answer1
     * @param string $answer1
     * @return \Sundari\Suggestproduct\Rule\Api\Data\RuleInterface
     */
    public function setAnswer1($answer1);

    /**
     * Get answer2
     * @return string|null
     */
    public function getAnswer2();

    /**
     * Set answer2
     * @param string $answer2
     * @return \Sundari\Suggestproduct\Rule\Api\Data\RuleInterface
     */
    public function setAnswer2($answer2);

    /**
     * Get product
     * @return string|null
     */
    public function getProduct();

    /**
     * Set product
     * @param string $product
     * @return \Sundari\Suggestproduct\Rule\Api\Data\RuleInterface
     */
    public function setProduct($product);
}

