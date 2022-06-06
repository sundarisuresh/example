<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestionbox\Model;

use Magento\Framework\Model\AbstractModel;
use Sundari\Suggestionbox\Api\Data\SuggestionInterface;

class Suggestion extends AbstractModel implements SuggestionInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Sundari\Suggestionbox\Model\ResourceModel\Suggestion::class);
    }

    /**
     * @inheritDoc
     */
    public function getSuggestionId()
    {
        return $this->getData(self::SUGGESTION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSuggestionId($suggestionId)
    {
        return $this->setData(self::SUGGESTION_ID, $suggestionId);
    }

    /**
     * @inheritDoc
     */
    public function getSuggestion()
    {
        return $this->getData(self::SUGGESTION);
    }

    /**
     * @inheritDoc
     */
    public function setSuggestion($suggestion)
    {
        return $this->setData(self::SUGGESTION, $suggestion);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerid()
    {
        return $this->getData(self::CUSTOMERID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerid($customerid)
    {
        return $this->setData(self::CUSTOMERID, $customerid);
    }

    /**
     * @inheritDoc
     */
    public function getDateandtime()
    {
        return $this->getData(self::DATEANDTIME);
    }

    /**
     * @inheritDoc
     */
    public function setDateandtime($dateandtime)
    {
        return $this->setData(self::DATEANDTIME, $dateandtime);
    }
}

