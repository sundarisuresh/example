<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Block\Listing2;

use Exception;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Around\List2\Model\List2Factory;



/**
 *
 */
class Index extends Template
{
    /**
     * @var Logo
     */

    protected $scopeConfig;
    protected $list2;
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
        List2Factory $list2,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Catalog\Helper\Image $imageHelper,

        ScopeConfigInterface           $scopeConfig,
        array                      $data = []
    )
    {
        $this->list2=$list2;
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
        $title = $this->scopeConfig->getValue('productlist/list2/title',$storeScope );
//        echo $time; exit();
        return $title;
    }
    public function getBackground(){
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $background = $this->scopeConfig->getValue('productlist/list2/background',$storeScope );
//        echo $time; exit();
        return $background;
    }



    public function getList2()
    {
        $list2 = $this->list2->create()->getCollection();
        $list2->setOrder('sortorder', 'ASC');
        return $list2;
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



