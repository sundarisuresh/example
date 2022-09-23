<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Location;

use Magento\Catalog\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 *
 */
class Error extends Action
{

    /**
     * @var Http
     */
    private $request;
    /**
     * @var PageFactory
     */
    private $resultPageFactory;
    /**
     * @var Session
     */
    private $catalogSession;

    /**
     * @param PageFactory $resultPageFactory
     * @param Context $context
     * @param Http $request
     * @param Session $catalogSession
     */
    public function __construct(PageFactory $resultPageFactory,
                                Context     $context,
                                Http        $request,
                                Session     $catalogSession
    )
    {
        $this->request = $request;
        $this->resultPageFactory = $resultPageFactory;
        $this->catalogSession = $catalogSession;
        parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}

