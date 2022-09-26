<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Header;

use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\Banner\Model\BannerFactory;



/**
 *
 */
class Index extends Template
{
    /**
     * @var Logo
     */
    protected $logo;
    protected $scopeConfig;
    protected $banner;
    /**
     * @var Session
     */
    protected $customerSession;
    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepository;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Session $customerSession
     * @param AddressRepositoryInterface $addressRepository
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(
        Context                    $context,
        Session                    $customerSession,
        AddressRepositoryInterface $addressRepository,
        BannerFactory $banner,
        Logo                       $logo,
        ScopeConfigInterface           $scopeConfig,
        array                      $data = []
    )
    {
        $this->logo = $logo;
        $this->addressRepository = $addressRepository;
        $this->customerSession = $customerSession;
        $this->banner=$banner;
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getLogoSrc(): string
    {
        return $this->logo->getLogoSrc();
    }

    /**
     * @throws Exception
     */
    public function getDefaultAddress()
    {
        $customerData = $this->customerSession->getCustomer();
        $addressId = $customerData->getDefaultDeliveryAdd();
        $address = $this->getAddressData($addressId);
        $plot = $address->getCustomAttribute('plot_no')->getValue();
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

    public function getBannerInterval(){
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $time = $this->scopeConfig->getValue('banner/interval/time',$storeScope );
//        echo $time; exit();
        return $time;
    }



    public function getBanners()
    {
       $banners= $this->banner->create()->getCollection();
        $banners->setOrder('sortorder','ASC');
       return $banners;
//       echo "<pre>";
//       foreach ($banners as $value){
//           print_r($value->getData());
//
//       }
//       exit;
    }

}

