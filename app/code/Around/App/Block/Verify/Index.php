<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Verify;

use Magento\Catalog\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;

/**
 *
 */
class Index extends Template
{
    /**
     * @var Logo
     */
    protected Logo $logo;

    /**
     * @var Session
     */
    private Session $catalogSession;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Logo $logo
     * @param Session $catalogSession
     * @param array $data
     */
    public function __construct(
        Context $context,
        Logo $logo,
        Session $catalogSession,
        array $data = []
    )
    {
        $this->logo = $logo;
        parent::__construct($context, $data);
        $this->catalogSession = $catalogSession;

    }

    /**
     * @return string
     */
    public function getLogoSrc(): string
    {
        return $this->logo->getLogoSrc();
    }

    /**
     * @return mixed
     */
    public function showError(): mixed
    {
        $result = $this->catalogSession->getOtpError();
        $this->catalogSession->unsOtpError();
        return $result;
    }

    /**
     * @return mixed
     */
    public function getPhone(): mixed
    {
        return $this->catalogSession->getPhone();
    }
}

