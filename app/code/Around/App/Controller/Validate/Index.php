<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Around\App\Controller\Validate;

use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Store\Model\ScopeInterface;

class Index extends Action
{
    protected $request;
    protected $catalogSession;
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $scopeConfig;
    private Session $customerSession;
    private AddressRepositoryInterface $addressRepository;


    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory                    $resultPageFactory,
                                Context                        $context,
                                Http                           $request,
                                \Magento\Catalog\Model\Session $catalogSession,
                                Session                        $customerSession,
                                ScopeConfigInterface           $scopeConfig,
                                AddressRepositoryInterface     $addressRepository

    )
    {
        $this->request = $request;
        $this->addressRepository = $addressRepository;
        $this->resultPageFactory = $resultPageFactory;
        $this->catalogSession = $catalogSession;
        $this->scopeConfig = $scopeConfig;
        $this->customerSession = $customerSession;
        parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $storeScope = ScopeInterface::SCOPE_STORE;
        $storeLocation = $this->scopeConfig->getValue('location/general/location', $storeScope);
        $storeDistance = $this->scopeConfig->getValue('location/general/distance', $storeScope);
        $array = explode(',', $storeLocation);
        $defaultAddress = $this->customerSession->getCustomer()->getDefaultDeliveryAdd();
        $addressInfo = $this->getAddressData($defaultAddress);
        $customerLocation = $addressInfo->getCustomAttribute('location')->getValue();
        $customerLocation = explode(',', $customerLocation);
        $distance = $this->distance((float)$array[0], (float)$array[1], (float)$customerLocation[0], $customerLocation[1], 'K');
        if ($distance < $storeDistance) {
            $this->_redirect('/');
        } else {
            $this->_redirect('login/location/error');
        }

    }

    /**
     * @param $addressId
     *
     * @return AddressInterface
     */
    public function getAddressData($addressId)
    {
        try {
            $addressData = $this->addressRepository->getById($addressId);
        } catch (Exception $exception) {
            echo "Error";
        }
        return $addressData;
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
}






