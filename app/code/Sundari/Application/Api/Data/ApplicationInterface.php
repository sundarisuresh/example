<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Application\Api\Data;

interface ApplicationInterface
{

    const EMAIL = 'email';
    const APPLICATION_ID = 'application_id';
    const NAME = 'name';

    /**
     * Get application_id
     * @return string|null
     */
    public function getApplicationId();

    /**
     * Set application_id
     * @param string $applicationId
     * @return \Sundari\Application\Application\Api\Data\ApplicationInterface
     */
    public function setApplicationId($applicationId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Sundari\Application\Application\Api\Data\ApplicationInterface
     */
    public function setName($name);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Sundari\Application\Application\Api\Data\ApplicationInterface
     */
    public function setEmail($email);
}

