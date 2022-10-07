<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Around\App\Controller\Location;

use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Api\Data\AddressExtensionFactory;
use Magento\Customer\Api\Data\AddressInterfaceFactory;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Directory\Model\ResourceModel\Region\Collection;
use Magento\Directory\Model\ResourceModel\Region\CollectionFactory;
use Magento\Customer\Api\Data\RegionInterface;

class Submit extends Action
{
    protected $request;
    protected $dataAddressFactory;
    protected $addressRepository;
    protected $addressExtensionFactory;
    protected $customerFactory;
    protected $customer;
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    private $regionInterface;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        PageFactory $resultPageFactory,
        Http $request,
        AddressInterfaceFactory $dataAddressFactory,
        AddressRepositoryInterface $addressRepository,
        Context $context,
        CustomerFactory $customerFactory,
        Session $customer,
        AddressExtensionFactory $addressExtensionFactory,
        RegionInterface $regionInterface,
        CollectionFactory $collectionFactory

    )
    {
        parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->dataAddressFactory = $dataAddressFactory;
        $this->addressRepository = $addressRepository;
        $this->request = $request;
        $this->customerFactory = $customerFactory;
        $this->customer = $customer;
        $this->addressExtensionFactory = $addressExtensionFactory;
        $this->regionInterface = $regionInterface;
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $lat = $this
            ->request
            ->getParam("lat");
        $long = $this
            ->request
            ->getParam("lng");
        $name = $this
            ->request
            ->getParam("name");
        $plot = $this
            ->request
            ->getParam("plot_no");
        $apartment = $this
            ->request
            ->getParam("apartment_name");
        $type = $this
            ->request
            ->getParam("type");

        $address = $this
            ->dataAddressFactory
            ->create();

        $address->setFirstname($name);
        $address->setLastname($name);
        $street[] = 'street 1';
        $street[] = 'street 2';
        $address->setStreet($street);
        $address->setCustomAttribute('location', $lat . ',' . $long);
        $address->setCustomAttribute('plot_no', $plot);
        $address->setCustomAttribute('apartment_name', $apartment);
        $address->setCustomAttribute('label', 'home');
        $customer = $this
            ->customer
            ->getCustomer();
        $address->setCity('Chennai');
        $address->setCountryId('IN');
        $address->setPostcode('60606');
        $region = $this->getRegionCode('Tamil Nadu');
        $address->setRegionId($region['region_id']);
        $address->setIsDefaultShipping(1);
        $address->setIsDefaultBilling(1);
        $address->setCustomerId($customer->getId());
        $address->setTelephone($customer->getPhoneNumber());
        try {
            $savedAddress = $this
                ->addressRepository
                ->save($address);
            $customer->setDefaultDeliveryAdd($savedAddress->getId());
            $customer->save();
            $this->_redirect('login/validate');
        } catch (Exception $exception) {
            echo $exception->getMessage();
            print_r($exception->getTraceAsString());
            exit();
        }

    }

    /**
     * @param string $region
     * @return string[]
     */
    public function getRegionCode(string $region)
    {
        $regionCode = $this->collectionFactory->create()
            ->addRegionNameFilter($region)
            ->getFirstItem()
            ->toArray();
        return $regionCode;
    }
}
