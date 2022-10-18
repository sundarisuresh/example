<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Cart\Block\Index;

use Exception;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Magento\Customer\Model\Session;
use Magento\Customer\Api\AddressRepositoryInterface;




/**
 *
 */
class Index extends Template
{
    /**`
     * @var Logo
     */
    protected $logo;
    protected $customerSession;
    private $addressRepository;
    private $checkoutSession;



    /**
     * Constructor
     * @param Context $context
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context $context,
        Logo    $logo,
        Session                    $customerSession,
        AddressRepositoryInterface $addressRepository,
        \Magento\Checkout\Model\Session $checkoutSession,

//        CollectionFactory $orderCollectionFactory,


        array   $data = []
    )
    {
        $this->checkoutSession = $checkoutSession;;
        $this->logo = $logo;
        $this->addressRepository = $addressRepository;
        $this->customerSession = $customerSession;
//        $this->orderCollectionFactory = $orderCollectionFactory;


        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }


    public function getAddressData($addressId)
    {
        try {
            $addressData = $this->addressRepository->getById($addressId);
            return $addressData;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());

        }
    }
        public function getDefaultAddress()
    {
        $customerData = $this->customerSession->getCustomer();
        $addressId = $customerData->getDefaultDeliveryAdd();
        $address = $this->getAddressData($addressId);
        $plot= $address->getCustomAttribute('plot_no')->getValue();

        if($address->getCustomAttribute('plot_no')) {
            $plot= $address->getCustomAttribute('plot_no')->getValue();
        }
        if ($address->getCustomAttribute('apartment_name')) {
            $appartment = $address->getCustomAttribute('apartment_name')->getValue();
        }
        $street = $address->getStreet()[0];
        $city = $address->getCity();
        if (isset($appartment)) {
            return $plot . ', ' . $appartment . ', ' . $street . ', ' . $city;
        } else {
            return $plot . ', ' . $street . ', ' . $city;
        }
    }
    public function getCheckoutSession()
    {
        return $this->checkoutSession;
    }

    public function getQuoteData()
    {
        $this->checkoutSession->getQuote();
        if (!$this->hasData('quote')) {
            $this->setData('quote', $this->checkoutSession->getQuote());
        }
        return $this->_getData('quote');
    }

}

