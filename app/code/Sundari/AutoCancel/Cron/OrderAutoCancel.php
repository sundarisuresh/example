<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\AutoCancel\Cron;

class OrderAutoCancel
{
    protected $orderCollectionFactory;
    protected $scopeConfig;
    protected $_date;
    protected $orderManagement;


    protected $logger;

    /**
     * Constructor
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(\Psr\Log\LoggerInterface                                   $logger,
                                \Magento\Framework\App\Config\ScopeConfigInterface         $scopeConfig,
                                \Magento\Framework\Stdlib\DateTime\TimezoneInterface       $date,
                                \Magento\Sales\Api\OrderManagementInterface                $orderManagement,

                                \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory
    )
    {
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->logger = $logger;
        $this->scopeConfig = $scopeConfig;
        $this->_date = $date;
        $this->orderManagement = $orderManagement;


    }

    /**
     * Execute the cron
     *
     * @return void
     */
    public function execute()
    {
        $this->logger->info("Cronjob start OrderAutoCancel is executed.");
        $time = $this->scopeConfig->getValue(
            'order/autocancel/time',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        $this->logger->info('time' . print_r($time));
        $currentdate = $this->_date->date()->format('Y-m-d H:i:s');
        $this->logger->info('today' . $currentdate);


        $collection = $this->orderCollectionFactory->create()
            ->addAttributeToSelect('*')
            ->addFieldToFilter('status',
                ['in' => ['pending', 'processing']]
            );
        foreach ($collection as $order) {
            $createdAt = $order->getCreatedAt();
            $hourdiff = round((strtotime($currentdate) - strtotime($createdAt)) / 3600, 1);
            $this->logger->info('hourdiff' . $hourdiff);

            $this->logger->info('createdAt' . $createdAt);
            if (0 >= 0) {

                try {
                    $this->logger->info('came');

                    $this->orderManagement->cancel($order->getId());

                } catch (\Exception $e) {
                    $this->logger->info("fd");
                    $this->logger->info($e);

                }

            }
        }
        $this->logger->info("Cronjob stop OrderAutoCancel is executed.");

//        return $collection;


    }
}

