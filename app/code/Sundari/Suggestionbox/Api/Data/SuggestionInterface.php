<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Suggestionbox\Api\Data;

interface SuggestionInterface
{

    const DATEANDTIME = 'dateandtime';
    const SUGGESTION_ID = 'suggestion_id';
    const SUGGESTION = 'suggestion';
    const CUSTOMERID = 'customerid';

    /**
     * Get suggestion_id
     * @return string|null
     */
    public function getSuggestionId();

    /**
     * Set suggestion_id
     * @param string $suggestionId
     * @return \Sundari\Suggestionbox\Suggestion\Api\Data\SuggestionInterface
     */
    public function setSuggestionId($suggestionId);

    /**
     * Get suggestion
     * @return string|null
     */
    public function getSuggestion();

    /**
     * Set suggestion
     * @param string $suggestion
     * @return \Sundari\Suggestionbox\Suggestion\Api\Data\SuggestionInterface
     */
    public function setSuggestion($suggestion);

    /**
     * Get customerid
     * @return string|null
     */
    public function getCustomerid();

    /**
     * Set customerid
     * @param string $customerid
     * @return \Sundari\Suggestionbox\Suggestion\Api\Data\SuggestionInterface
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
     * @return \Sundari\Suggestionbox\Suggestion\Api\Data\SuggestionInterface
     */
    public function setDateandtime($dateandtime);
}

