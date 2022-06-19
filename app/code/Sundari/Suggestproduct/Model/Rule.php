<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestproduct\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Suggestproduct\Api\Data\RuleInterface;

class Rule extends AbstractModel implements RuleInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Suggestproduct\Model\ResourceModel\Rule::class);
    }

    /**
     * @inheritDoc
     */
    public function getRuleId()
    {
        return $this->getData(self::RULE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setRuleId($ruleId)
    {
        return $this->setData(self::RULE_ID, $ruleId);
    }

    /**
     * @inheritDoc
     */
    public function getAnswer1()
    {
        return $this->getData(self::ANSWER1);
    }

    /**
     * @inheritDoc
     */
    public function setAnswer1($answer1)
    {
        return $this->setData(self::ANSWER1, $answer1);
    }

    /**
     * @inheritDoc
     */
    public function getAnswer2()
    {
        return $this->getData(self::ANSWER2);
    }

    /**
     * @inheritDoc
     */
    public function setAnswer2($answer2)
    {
        return $this->setData(self::ANSWER2, $answer2);
    }

    /**
     * @inheritDoc
     */
    public function getProduct()
    {
        return $this->getData(self::PRODUCT);
    }

    /**
     * @inheritDoc
     */
    public function setProduct($product)
    {
        return $this->setData(self::PRODUCT, $product);
    }
}

