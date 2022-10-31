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
    protected $resultRedirectFactory;
    $this->resultRedirectFactory = $resultRedirectFactory;
    $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererUrl();
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


