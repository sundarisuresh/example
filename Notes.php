$customer = $this->customerSession->getCustomer();
if (!$customer->getId()) {
return false;
}
$customer = $this->customerRepositoryInterface->getById($customer->getId());
if (!$customer->getCustomAttribute('creditbalance')) {
return false;
}
$grandTotal = $this->cart->getQuote()->getGrandTotal();

if ($customer->getCustomAttribute('creditbalance')->getValue() < $grandTotal) {
return false;
}


// $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
//        $logger = new \Zend_Log();
//        $logger->addWriter($writer);
//        $logger->info('text 123');


<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\App\Controller\Verify;

use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Twilio\Rest\Client;

class Index extends \Magento\Framework\App\Action\Action
{    protected $request;


    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    private \Magento\Customer\Model\Session $_customerSession;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                \Magento\Framework\App\Action\Context       $context,
                                \Magento\Customer\Model\Session $customerSession,
                                \Magento\Framework\App\Request\Http         $request
    )
    {        $this->request = $request;
        $this->_customerSession = $customerSession;

        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);

    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $phone = $this->request->getParam("phone");
        $otp  = $this->randNum();
        $this->_customerSession->setOtp($otp);
        echo $otp;
//        exit;
        $sid    = "AC478d735f436986f7d2b6487aa9a977da";
        $token  = "7bbe05dc74d98d63ce57bda7ff3e964d";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create("+91".$phone, // to
                array(
                    "from" => "+18158699964",
                    "messagingServiceSid" => "MG04f723e194d7568e19027238e7e18ee1",
                    "body" => "Your OTP is ".$otp
                )
            );

        print($message->sid);
        return $this->resultPageFactory->create();
    }

    private function randNum()
    {
        $digits = 4;
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }
}

Public Key: c2e9ca4e2694a1706e4139ff8eb535b0
Private Key: d1748ca36f96e6251f0f9da69eb63468

$customerData = $this->customersession->getCustomer()->getId();

// GIT Commands

eval `ssh-agent -s` && ssh-add .ssh/id_rsa
git pull origin develop && git add app/code/ && git add Notes.php && git commit -m "banner" && git push origin develop

// GIT Commands

git pull origin develop
git add app/code/
git commit -m "banner"
git push origin develop

13.0172114,80.1566885


"<?php $list= $block->getCustomerAddresses();?>

        <ul class="list-group">
            <?php
            foreach ($list as $value)
            {?>
                <li class="list-group-item">
                    <?php echo $value->getCustomAttribute('plot_no')->getValue(); ?>
                </li>
                <?php
            }
            ?>

        </ul>

        ">

get adress using id and set that adress ass default address
set adress id in defdeladrss  in cus




Public Key: c2e9ca4e2694a1706e4139ff8eb535b0
Private Key: d1748ca36f96e6251f0f9da69eb63468

$customerData = $this->customersession->getCustomer()->getId();




Google API key: AIzaSyDApbZXTuoFmUc1dJNi4Cov30wW3FXon1k
AIzaSyCh0qDXpKwtRpHKZq7OxU2z3YBWbAFRM7w



13.0172114,80.1566885
https://maps.googleapis.com/maps/api/geocode/json?latlng=13.0150868,80.1582994&result_type=premise&key=AIzaSyDApbZXTuoFmUc1dJNi4Cov30wW3FXon1k


bin/magento module:disable Magento_Csp



            // console.log("Ds");

            // latlng = marker.getPosition();
            // url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+ latlng.lat() + ',' + latlng.lng() + '&sensor=false&result_type=premise&key=AIzaSyDApbZXTuoFmUc1dJNi4Cov30wW3FXon1k';
            // $.get(url, function(data) {
            //     if (data.status == 'OK') {
            //         map.setCenter(data.results[0].geometry.location);
            //         if (confirm('Do you also want to change location text to ' + data.results[0].formatted_address) === true) {
            //             $('#searchmap').val(data.results[0].formatted_address);
            //             $('#lat').val(data.results[0].geometry.location.lat);
            //             $('#lng').val(data.results[0].geometry.location.lng);
            //         }
            //     }
            // });


        // latlng = marker.getPosition();
        // url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+ latlng.lat() + ',' + latlng.lng() + '&sensor=false&result_type=premise&key=AIzaSyDApbZXTuoFmUc1dJNi4Cov30wW3FXon1k';
        // $.get(url, function(data) {
        //     if (data.status == 'OK') {
        //         map.setCenter(data.results[0].geometry.location);
        //         if (confirm('Do you also want to change location text to ' + data.results[0].formatted_address) === true) {
        //             $('#searchmap').val(data.results[0].formatted_address);
        //             $('#lat').val(data.results[0].geometry.location.lat);
        //             $('#lng').val(data.results[0].geometry.location.lng);
        //         }
        //     }
        // });

status list
pending approval-pending
    approved/confirmed-processing
    processing
shiped-processing
complete-complete
 approved/pro/shipped

 protected $orderRepository;
    \Magento\Sales\Api\OrderRepositoryInterface $orderRepository
    $this->orderRepository = $orderRepository;
       $order = $this->orderRepository->get($orderId);

       $order->getCreatedAt();



       VA0169887439
       728498022242
       9786630679
           dineshrossi132@gmail.com
N005642029



VA0169887596
N005642049


FOS001823201902

29/10-
href="<?php echo $block->getUrl('account/trackorder')."?orderid=". $id;?>"

*
    use Magento\Framework\Controller\Result\RedirectFactory;

    protected $resultRedirectFactory;
                                    RedirectFactory $resultRedirectFactory,

    $this->resultRedirectFactory = $resultRedirectFactory;
    $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();  /$resultRedirect->setPath('login');
                    return $resultRedirect;

*
    protected $messageManager;
\Magento\Framework\Message\ManagerInterface          $messageManager,
        $this->messageManager = $messageManager;
            $this->messageManager->addSuccess(__("your order canceled sucessfully"));
            $this->messageManager->addError(__("try again later"));


 *
    protected $request;
                                \Magento\Framework\App\Request\Http $request,
        $this->request = $request;
                                $this->request->getParam('orderid');


*
    protected $orderManagement;
                                \Magento\Sales\Api\OrderManagementInterface $orderManagement,
            $this->orderManagement->cancel($orderId);


*
    protected $productRepository;
        \Magento\Catalog\Model\ProductRepository $productRepository,
        $this->productRepository = $productRepository;
$product=$this->productRepository->getById($productid);

*
 protected $formKey;
    protected $cart;
    protected $product;
 \Magento\Framework\Data\Form\FormKey $formKey,
                                \Magento\Checkout\Model\Cart $cart,
                                \Magento\Catalog\Model\Product $product,
 $this->formKey = $formKey;
        $this->cart = $cart;
        $this->product = $product;
 $params = array(
     'form_key' => $this->formKey->getFormKey(),
     'product' => $productId, //product Id
     'qty'   =>$qty//quantity of product
 );
            $this->cart->addProduct($product, $params);
            $this->cart->save();


*
use Magento\Framework\App\Action\Action;
class Index extends Action
sContext $context,
 parent::__construct($context);




php -d memory_limit=-1 bin/magento setup:install --search-engine=elasticsearch7 --elasticsearch-host=172.24.0.2 --elasticsearch-port=9200 --elasticsearch-enable-auth=0
php bin/magento setup:install --search-engine=elasticsearch7 --elasticsearch-host="localhost" --elasticsearch-port=9200

1342836026

LAYOUT NAMES
catalog_productt_view.xml for product page

TO ADD CHILD IN PARENT
                              $block->getChildHtml('', true)

USE THIS TO OVERRIDE A TEMPLATE
<referenceBlock name="product.info.description">
            <action method="setTemplate">
                <argument name="template" xsi:type="string">Training_Engrave::engrave.phtml</argument>
            </action>
        </referenceBlock>

to create custom log
$writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('text message');
//        $logger->info(print_r($parentItem->getName(), true));
        $parentItem->setEngrave('asd');
//echo "hgfd";
//        print_r($parentItem->getName());
//        exit;

<form action="<?php echo $block->getUrl("registration/index/post");?> " method="post"">


    <?php $productCollection = $block->getSaleProducts();
 if ($productCollection->getSize()):?>
    <div class="products-list">
        <?php foreach ($productCollection as $product): ?>
            <?php echo $product->getName() ?>
            <?php // Display other product information here as needed ?>
        <?php endforeach ?>
    </div>
<?php endif ?>


    protected $collectionFactory;
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        $this->collectionFactory = $collectionFactory;

public function getSaleProducts()
    {
        $attributeCode = 'sales';
        $attributeValue = 1;
        $productCollection = $this->collectionFactory->create()
            ->addAttributeToSelect('*')
           ->addAttributeToFilter($attributeCode, $attributeValue)
            ->load();
        return $productCollection;
    }



    <?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
use Magento\Framework\App\Action\Action;

?>
<?php
/**
 * Product list template
 *
 * @var $block \Magento\Catalog\Block\Product\ListProduct
 * @var \Magento\Framework\Escaper $escaper
 * @var \Magento\Framework\View\Helper\SecureHtmlRenderer $secureRenderer
 */
?>
<?php
$_productCollection = $block->getSaleProducts();
/** @var \Magento\Catalog\Helper\Output $_helper */
$_helper = $block->getData('outputHelper');
?>
<?php if (!$_productCollection->count()): ?>
    <div class="message info empty">
        <div><?= $escaper->escapeHtml(__('We can\'t find products matching the selection.')) ?></div>
    </div>
<?php else: ?>
    <?= $block->getToolbarHtml() ?>
    <?= $block->getAdditionalHtml() ?>
    <?php
    if ($block->getMode() === 'grid') {
        $viewMode = 'grid';
        $imageDisplayArea = 'category_page_grid';
        $showDescription = false;
        $templateType = \Magento\Catalog\Block\Product\ReviewRendererInterface::SHORT_VIEW;
    } else {
        $viewMode = 'list';
        $imageDisplayArea = 'category_page_list';
        $showDescription = true;
        $templateType = \Magento\Catalog\Block\Product\ReviewRendererInterface::FULL_VIEW;
    }
    /**
     * Position for actions regarding image size changing in vde if needed
     */
    $pos = $block->getPositioned();
    ?>
    <div class="products wrapper <?= /* @noEscape */ $viewMode ?> products-<?= /* @noEscape */ $viewMode ?>">
        <ol class="products list items product-items">
            <?php /** @var $_product \Magento\Catalog\Model\Product */ ?>
            <?php foreach ($_productCollection as $_product): ?>
                <li class="item product product-item">
                    <div class="product-item-info"
                         id="product-item-info_<?= /* @noEscape */ $_product->getId() ?>"
                         data-container="product-<?= /* @noEscape */ $viewMode ?>">
                        <?php
                        $productImage = $block->getImage($_product, $imageDisplayArea);
                        if ($pos != null) {
                            $position = 'left:' . $productImage->getWidth() . 'px;'
                                . 'top:' . $productImage->getHeight() . 'px;';
                        }
                        ?>
                        <?php // Product Image ?>
                        <a href="<?= $escaper->escapeUrl($_product->getProductUrl()) ?>"
                           class="product photo product-item-photo"
                           tabindex="-1">
                            <?= $productImage->toHtml() ?>
                        </a>
                        <div class="product details product-item-details">
                            <?php $_productNameStripped = $block->stripTags($_product->getName(), null, true); ?>
                            <strong class="product name product-item-name">
                                <a class="product-item-link"
                                   href="<?= $escaper->escapeUrl($_product->getProductUrl()) ?>">
                                    <?=/* @noEscape */ $_helper->productAttribute($_product, $_product->getName(), 'name')?>
                                </a>
                            </strong>
                            <?= $block->getReviewsSummaryHtml($_product, $templateType) ?>
                            <?= /* @noEscape */ $block->getProductPrice($_product) ?>

                            <?= $block->getProductDetailsHtml($_product) ?>

                            <div class="product-item-inner">
                                <div class="product actions product-item-actions">
                                    <div class="actions-primary">
                                        <?php if ($_product->isSaleable()):?>
                                            <?php $postParams = $block->getAddToCartPostParams($_product); ?>
                                            <form data-role="tocart-form"
                                                  data-product-sku="<?= $escaper->escapeHtml($_product->getSku()) ?>"
                                                  action="<?= $escaper->escapeUrl($postParams['action']) ?>"
                                                  method="post">
<!--                                                --><?php //$options = $block->getData('viewModel')->getOptionsData($_product); ?>
<!--                                                --><?php //foreach ($options as $optionItem): ?>
<!--                                                    <input type="hidden"-->
<!--                                                           name="--><?php //= $escaper->escapeHtml($optionItem['name']) ?><!--"-->
<!--                                                           value="--><?php //= $escaper->escapeHtml($optionItem['value']) ?><!--">-->
<!--                                                --><?php //endforeach; ?>
                                                <input type="hidden"
                                                       name="product"
                                                       value="<?= /* @noEscape */ $postParams['data']['product'] ?>">
                                                <input type="hidden"
                                                       name="<?= /* @noEscape */ Action::PARAM_NAME_URL_ENCODED ?>"
                                                       value="<?=
                                                       /* @noEscape */ $postParams['data'][Action::PARAM_NAME_URL_ENCODED]
                                                       ?>">
                                                <?= $block->getBlockHtml('formkey') ?>
                                                <button type="submit"
                                                        title="<?= $escaper->escapeHtmlAttr(__('Add to Cart')) ?>"
                                                        class="action tocart primary"
                                                        disabled>
                                                    <span><?= $escaper->escapeHtml(__('Add to Cart')) ?></span>
                                                </button>
                                            </form>
                                        <?php else:?>
                                            <?php if ($_product->isAvailable()):?>
                                                <div class="stock available">
                                                    <span><?= $escaper->escapeHtml(__('In stock')) ?></span></div>
                                            <?php else:?>
                                                <div class="stock unavailable">
                                                    <span><?= $escaper->escapeHtml(__('Out of stock')) ?></span></div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?= ($pos && strpos($pos, $viewMode . '-primary')) ?
                                        /* @noEscape */ $secureRenderer->renderStyleAsTag(
                                            $position,
                                            'product-item-info_' . $_product->getId() . ' div.actions-primary'
                                        ) : '' ?>
                                    <div data-role="add-to-links" class="actions-secondary">
                                        <?php if ($addToBlock = $block->getChildBlock('addto')): ?>
                                            <?= $addToBlock->setProduct($_product)->getChildHtml() ?>
                                        <?php endif; ?>
                                    </div>
                                    <?= ($pos && strpos($pos, $viewMode . '-secondary')) ?
                                        /* @noEscape */ $secureRenderer->renderStyleAsTag(
                                            $position,
                                            'product-item-info_' . $_product->getId() . ' div.actions-secondary'
                                        ) : '' ?>
                                </div>
                                <?php if ($showDescription): ?>
                                    <div class="product description product-item-description">
                                        <?= /* @noEscape */ $_helper->productAttribute(
                                            $_product,
                                            $_product->getShortDescription(),
                                            'short_description'
                                        ) ?>
                                        <a href="<?= $escaper->escapeUrl($_product->getProductUrl()) ?>"
                                           title="<?= /* @noEscape */ $_productNameStripped ?>"
                                           class="action more"><?= $escaper->escapeHtml(__('Learn More')) ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?= ($pos && strpos($pos, $viewMode . '-actions')) ?
                        /* @noEscape */ $secureRenderer->renderStyleAsTag(
                            $position,
                            'product-item-info_' . $_product->getId() . ' div.product-item-actions'
                        ) : '' ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
<!--    --><?php //= $block->getChildBlock('toolbar')->setIsBottom(true)->toHtml() ?>
    <?php // phpcs:ignore Magento2.Legacy.PhtmlTemplate ?>
    <script type="text/x-magento-init">
    {
        "[data-role=tocart-form], .form.map.checkout": {
            "catalogAddToCart": {
                "product_sku": "<?= $escaper->escapeJs($_product->getSku()) ?>"
            }
        }
    }
    </script>
<?php endif; ?>

SPLIT $items = explode(",", $hashtag);
foreach ($items as $item) {
    echo $item . "<br>";


EMPTY ATTRIBUTE VALUE
            ->addAttributeToFilter('hashtag', array('notnull' => true))


LIKE ATTRIBUTE VALUE
                ->addAttributeToFilter('hashtag', array('like' => '%' . $request . '%'))

CONVERT AN ARRAY TO STRING

$hash= implode(', ', $array);

TO CALL CHILD HTML IN PARENT BLOCK
<?= $block->getChildHtml('sales.products', true) ?>

<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
/** @var \Magento\Theme\Block\Html\Breadcrumbs $block */
/** @var \Magento\Catalog\ViewModel\Product\Breadcrumbs $viewModel */
$viewModel = $block->getData('viewModel');
?>
<div class="breadcrumbs"></div>
<?php
$widget = $this->helper(\Magento\Framework\Json\Helper\Data::class)->jsonDecode($viewModel->getJsonConfigurationHtmlEscaped());
$widgetOptions = $this->helper(\Magento\Framework\Json\Helper\Data::class)->jsonEncode($widget['breadcrumbs']);
?>

