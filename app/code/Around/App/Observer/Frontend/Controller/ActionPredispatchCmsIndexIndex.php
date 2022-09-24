<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Around\App\Observer\Frontend\Controller;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;

class ActionPredispatchCmsIndexIndex implements ObserverInterface
{
    /**
     * @var RedirectInterface
     */
    protected $_redirect;
    private $customerSession;
    private $scopeConfig;
    private $actionFlag;
    private $url;

    /**
     * Constructor
     *
     * @param Session $customerSession
     * @param ScopeConfigInterface $scopeConfig
     * @param RedirectInterface $redirect
     * @param ActionFlag $actionFlag
     * @param UrlInterface $url
     */
    public function __construct(
        Session              $customerSession,
        ScopeConfigInterface $scopeConfig,
        RedirectInterface    $redirect,
        ActionFlag           $actionFlag,
        UrlInterface         $url
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->customerSession = $customerSession;
        $this->_redirect = $redirect;
        $this->actionFlag = $actionFlag;
        $this->url = $url;
    }

    /**
     * Execute observer
     *
     * @param Observer $observer
     * @return ActionPredispatchCmsIndexIndex
     */
    public function execute(
        Observer $observer
    )
    {
        $customer = $this->customerSession->getCustomer();
        $defaultAddress = $customer->getDefaultDeliveryAdd();
        if (!$defaultAddress) {
            $this->actionFlag->set('', Action::FLAG_NO_DISPATCH, true);
            $observer->getControllerAction()->getResponse()->setRedirect($this->url->getUrl("login/location/"));
            return $this;
        }
    }
}
