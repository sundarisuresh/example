<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Emical\Api\Data;

interface EmiInterface
{

    const MONTH = 'month';
    const GENDER = 'gender';
    const INTEREST = 'interest';
    const EMI_ID = 'emi_id';

    /**
     * Get emi_id
     * @return string|null
     */
    public function getEmiId();

    /**
     * Set emi_id
     * @param string $emiId
     * @return \Sundari\Emical\Emi\Api\Data\EmiInterface
     */
    public function setEmiId($emiId);

    /**
     * Get month
     * @return string|null
     */
    public function getMonth();

    /**
     * Set month
     * @param string $month
     * @return \Sundari\Emical\Emi\Api\Data\EmiInterface
     */
    public function setMonth($month);

    /**
     * Get interest
     * @return string|null
     */
    public function getInterest();

    /**
     * Set interest
     * @param string $interest
     * @return \Sundari\Emical\Emi\Api\Data\EmiInterface
     */
    public function setInterest($interest);

    /**
     * Get gender
     * @return string|null
     */
    public function getGender();

    /**
     * Set gender
     * @param string $gender
     * @return \Sundari\Emical\Emi\Api\Data\EmiInterface
     */
    public function setGender($gender);
}

