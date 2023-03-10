<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Listing1;

use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\Productlist1\Model\List1Factory;



/**
 *
 */
class Index extends Template
{
    /**
     * @var Logo
     */

    protected $scopeConfig;
    protected $list1;
    protected $productRepository;
    protected $imageHelper;
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
        List1Factory $list1,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Catalog\Helper\Image $imageHelper,

        ScopeConfigInterface           $scopeConfig,
        array                      $data = []
    )
    {
        $this->list1=$list1;
        $this->scopeConfig = $scopeConfig;
        $this->imageHelper = $imageHelper;

        $this->productRepository = $productRepository;

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

    public function getTitle(){
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $title = $this->scopeConfig->getValue('productlist/list1/title',$storeScope );
//        echo $time; exit();
        return $title;
    }
    public function getBackground(){
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $background = $this->scopeConfig->getValue('productlist/list1/background',$storeScope );
//        echo $time; exit();
        return $background;
    }



    public function getList1()
    {
        $list1 = $this->list1->create()->getCollection();
        $list1->setOrder('sortorder', 'ASC');
        return $list1;
    }

    public function getProductInfo($productid)
    {
       return $product= $this->productRepository->getById($productid);
    }
    public function getBase($product)
    {
       return $this->imageHelper->init($product, 'product_base_image')->getUrl();

    }




}



