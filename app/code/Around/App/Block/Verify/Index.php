<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Verify;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $logo;
    private $catalogSession;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Theme\Block\Html\Header\Logo $logo,
        \Magento\Catalog\Model\Session $catalogSession,
        array $data = []
    ) { $this->logo = $logo;
        parent::__construct($context, $data);
        $this->catalogSession = $catalogSession;

    }
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }


    public function showError(){
       $result = $this->catalogSession->getOtpError();
        $this->catalogSession->unsOtpError();
        return $result;
    }
    public function getPhone(){
        return $this->catalogSession->getPhone();
    }
}

