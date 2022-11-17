<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Search;

use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\Banner\Model\BannerFactory;
use Psr\Log\LoggerInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;


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
    protected $searchCriteriaBuilder;

    /**
     * @var Session
     */
    protected $customerSession;
    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepository;
    private $logger;


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
        LoggerInterface $logger,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array                      $data = []
    )
    {
        $this->logo = $logo;
        $this->addressRepository = $addressRepository;
        $this->customerSession = $customerSession;
        $this->banner=$banner;
        $this->scopeConfig = $scopeConfig;
        $this->logger = $logger;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getLogoSrc(): string
    {
        return $this->logo->getLogoSrc();
    }

    public function getCustomerId()
    {
        $customerid= $this->customerSession->getCustomer()->getId();
        return $customerid;
    }

    /**
     * @throws Exception
     */
    public function getDefaultAddress()
    {
        $customerData = $this->customerSession->getCustomer();
        print_r($customerData->getId());
//        exit;
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

    public function getCustomerAddresses()
    {
        $customerId=$this->getCustomerId();
        $addressesList = [];
        try {
            $searchCriteria = $this->searchCriteriaBuilder->addFilter(
                'parent_id',$customerId)->create();
            $addressRepository = $this->addressRepository->getList($searchCriteria);
            foreach($addressRepository->getItems() as $address) {
                $addressesList[] = $address;
            }
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage());
        }

        return $addressesList;
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

