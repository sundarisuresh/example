<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace StageBit\SignupSheet\Api\Data;

interface SignupSheetInterface
{

    const DATE = 'date';
    const NAME = 'name';
    const SIGNUPSHEET_ID = 'signupsheet_id';

    /**
     * Get signupsheet_id
     * @return string|null
     */
    public function getSignupsheetId();

    /**
     * Set signupsheet_id
     * @param string $signupsheetId
     * @return \StageBit\SignupSheet\SignupSheet\Api\Data\SignupSheetInterface
     */
    public function setSignupsheetId($signupsheetId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \StageBit\SignupSheet\SignupSheet\Api\Data\SignupSheetInterface
     */
    public function setName($name);

    /**
     * Get date
     * @return string|null
     */
    public function getDate();

    /**
     * Set date
     * @param string $date
     * @return \StageBit\SignupSheet\SignupSheet\Api\Data\SignupSheetInterface
     */
    public function setDate($date);
}

