<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Location;

use Exception;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Api\Data\AddressInterfaceFactory;

class Submit extends \Magento\Framework\App\Action\Action
{protected $request;
    protected $dataAddressFactory;
    protected $addressRepository;
protected $addressExtensionFactory;
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                \Magento\Framework\App\Request\Http         $request,
                                AddressInterfaceFactory $dataAddressFactory,
                                AddressRepositoryInterface $addressRepository,
                                \Magento\Framework\App\Action\Context       $context,
                                \Magento\Customer\Api\Data\AddressExtensionFactory $addressExtensionFactory
)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->dataAddressFactory = $dataAddressFactory;
        $this->addressRepository = $addressRepository;
        $this->request = $request;
        $this->addressExtensionFactory=$addressExtensionFactory;
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $lat=$this->request->getParam("lat");
        $long=$this->request->getParam("lng");
        $name=$this->request->getParam("name");
        $plot=$this->request->getParam("plot no");
        $apartment=$this->request->getParam("apartment name");
        $postal=$this->request->getParam("postal-code");


        echo $lat;
        echo $long;
        //return $this->resultPageFactory->create();
        $address = $this->dataAddressFactory->create();

        $address->setFirstname('Rakesh');
        $address->setLastname('Jesadiya');
        $address->setTelephone('telephone');
        $street[] = 'street 1';//pass street as array
        $street[] = 'street 2';
        $address->setStreet($street);
        $location[] = $lat;
        $location[] = $long;
//        $customer = getCustomer();
        $address->setCustomAttribute('location', 1);
        $address->setCustomAttribute('plot_no', 1);
//        $this->customerRepository->save($customer);  

//        $address->setlocation($location);

        $regionId = 23; // For Illinois
        $customerId = 3; // Pass dynamica Value
        $address->setCity('chicago');
        $address->setCountryId('US');
        $address->setPostcode('60606');
//        $address->setplotno($plot);
//        $address->setApartmentname($apartment);

        $address->setRegionId($regionId);
        $address->setIsDefaultShipping(1);
        $address->setIsDefaultBilling(1);
        $address->setCustomerId($customerId);

//        $addressExtension = $address->getExtensionAttributes();
//        if(null === $addressExtension){
//            // $addressExtensionFactory is instance of \Magento\Customer\Api\Data\AddressExtensionFactory
//            $addressExtension =$this->addressExtensionFactory->create();
//        }

//        $addressExtension->setPlotNo(123);
//        $addressExtension->setData('location',123);
//$address->setExtensionAttributes($addressExtension);

        try {
            $this->addressRepository->save($address);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

    }



    }



