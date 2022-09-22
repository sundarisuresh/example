<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Header;
use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $logo;
    protected $customerSession;
    private $addressRepository;



    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        AddressRepositoryInterface $addressRepository,


        \Magento\Theme\Block\Html\Header\Logo $logo,

        array $data = []
    ) {         $this->logo = $logo;
        $this->addressRepository = $addressRepository;

        $this->customerSession = $customerSession;


        parent::__construct($context, $data);
    }
    public function getLogoSrc()
    {
        return $this->logo->getLogoSrc();
    }
    public function getDefaultAddress()
    {
        $customerData = $this->customerSession->getCustomer();
        $addressId= $customerData->getDefaultDeliveryAdd();
        $address=$this->getAddressData($addressId);
        $plot= $address->getCustomAttribute('plot_no')->getValue();
        if($address->getCustomAttribute('apartment_name')){
            $appartment= $address->getCustomAttribute('apartment_name')->getValue();
        }
        $street = $address->getStreet()[0];
        $city=$address->getCity();
         if(isset($appartment)) {
          return   $plot . ', ' . $appartment . ', ' . $street . ', ' . $city;
         } else {
             return   $plot . ', ' . $street . ', ' . $city;

         }
    }

    /**
     * @throws Exception
     */
    public function getAddressData($addressId)
    {
        try {
            $addressData = $this->addressRepository->getById($addressId);
            return $addressData;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());

        }
    }

}

