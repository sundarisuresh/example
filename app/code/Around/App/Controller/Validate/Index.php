<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Validate;

use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{    protected $request;
    protected $catalogSession;


    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $scopeConfig;


    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                \Magento\Framework\App\Action\Context       $context,

                                \Magento\Framework\App\Request\Http         $request,
                                \Magento\Catalog\Model\Session $catalogSession,
                                \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
)
    {        $this->request = $request;

        $this->resultPageFactory = $resultPageFactory;
        $this->catalogSession = $catalogSession;
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

        $storeLocation= $this->scopeConfig->getValue('location/general/location', $storeScope);
        $storeDistance= $this->scopeConfig->getValue('location/general/distance', $storeScope);

        $array = explode(',', $storeLocation);
        echo $array[0];

        exit;
        echo $this->distance($array[0], $array[1], -98.53506, "K") . " Kilometers<br>";

        exit();
        $this->_redirect('/');




    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
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






