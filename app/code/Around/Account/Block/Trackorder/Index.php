<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Block\Trackorder;
use Magento\Theme\Block\Html\Header\Logo;
use Magento\Customer\Model\Session;
use Exception;




class Index extends \Magento\Framework\View\Element\Template
{    protected $logo;
    protected $request;
    protected $customerSession;
    protected $orderRepository;







    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        Session                    $customerSession,
        Logo                       $logo,

        array $data = []
    ) {
        $this->logo = $logo;
        $this->request = $request;
        $this->customerSession = $customerSession;
        $this->orderRepository = $orderRepository;



        parent::__construct($context, $data);
    }
    public function getLogoSrc(): string
    {
        return $this->logo->getLogoSrc();
    }
    public function getCustomer()
    {
        $customer = $this->customerSession->getCustomer();
        return $customer;
    }

    public function getOrder()
    {
        $orderId=$this->request->getParam('orderid');
        $order = $this->orderRepository->get($orderId);
        return $order;

    }
}

