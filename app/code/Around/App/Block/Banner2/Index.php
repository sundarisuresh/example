<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Banner2;

use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\Banner2\Model\Banner2Factory;


/**
 *
 */
class Index extends Template
{
    /**
     * @var Logo
     */

    protected $scopeConfig;
    protected $banner2;
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
        Banner2Factory $banner2,
        ScopeConfigInterface           $scopeConfig,
        array                      $data = []
    )
    {
        $this->banner2=$banner2;
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
        $time = $this->scopeConfig->getValue('banner2/interval/time',$storeScope );
//        echo $time; exit();
        return $time;
    }



    public function getBanner2()
    {
        $banner2= $this->banner2->create()->getCollection();
        $banner2->setOrder('sortorder','ASC');
        return $banner2;

    }

}


