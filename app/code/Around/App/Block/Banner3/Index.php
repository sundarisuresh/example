<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Banner3;

use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\Banner3\Model\Banner3Factory;


/**
 *
 */
class Index extends Template
{
    /**
     * @var Logo
     */

    protected $scopeConfig;
    protected $banner3;
    /**
     * @var Session
     */

    /**
     * @var AddressRepositoryInterface
     */


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
        Banner3Factory $banner3,
        ScopeConfigInterface           $scopeConfig,
        array                      $data = []
    )
    {
        $this->banner3=$banner3;
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */

    /**
     * @throws Exception
     */


    /**
     * @throws Exception
     */

    public function getDelay(){
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $time = $this->scopeConfig->getValue('banner3/interval/time',$storeScope );
//        echo $time; exit();
        return $time;
    }



    public function getBanner3()
    {
        $banner3= $this->banner3->create()->getCollection();
        $banner3->setOrder('sortorder','ASC');
        return $banner3;

    }

}


