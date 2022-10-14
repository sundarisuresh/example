<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Account\Block\Orderslist;
use Magento\Theme\Block\Html\Header\Logo;
use Magento\Customer\Model\Session;
use Magento\Customer\Api\AddressRepositoryInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Exception;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;





class Index extends \Magento\Framework\View\Element\Template
{    protected $logo;
    protected $customerSession;
    private $addressRepository;
    private $logger;
    protected $searchCriteriaBuilder;
    private $data;
    private $context;
    private $orderCollectionFactory;
    protected $addressCollection;






    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Session                    $customerSession,
        AddressRepositoryInterface $addressRepository,
        LoggerInterface $logger,
        \Magento\Sales\Model\ResourceModel\Order\Address\CollectionFactory $addressCollection,

        SearchCriteriaBuilder $searchCriteriaBuilder,
        CollectionFactory $orderCollectionFactory,



        Logo                       $logo,

        array $data = []
    ) {
        $this->logo = $logo;
        $this->addressRepository = $addressRepository;
        $this->logger = $logger;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->addressCollection = $addressCollection;


        $this->customerSession = $customerSession;


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
    public function getCustomerAddresses()
    {
        $customerId= $this->getCustomer()->getId();
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
    public function getCustomerOrder()
    {
        $customerId = $this->getCustomer()->getId(); // pass customer id
        return $this->orderCollectionFactory->create()
            ->addFieldToFilter('customer_id', $customerId);
    }
    public function getShippingAddress($orderShippingId)
    {
        return $this->addressCollection->create()->addFieldToFilter('entity_id',array($orderShippingId))->getFirstItem();
    }
}

