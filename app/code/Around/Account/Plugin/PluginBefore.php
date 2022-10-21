<?php

namespace Around\Account\Plugin;


class PluginBefore
{
    protected $request;
    protected $orderRepository;

    public function __construct(
                                \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
                                \Magento\Framework\App\Request\Http $request

    )
    {
        $this->request = $request;
        $this->orderRepository = $orderRepository;

    }
    public function beforeSetLayout(\Magento\Sales\Block\Adminhtml\Order\View $view)

{
    $orderId = $this->request->getParam('order_id');
    $order =$this->orderRepository->get($orderId);


    $message = 'Are you sure you want to do this?';
    $url = $view->getUrl('account/order/aproove') . $view->getOrderId();
//   echo $order->getStatus();
//   exit;
    if ($order->getStatus() == 'pending_approval') {
        $view->addButton(
            'aprove',
            [
                'label' => __('Aprove'),
                'class' => 'myclass',
                'onclick' => "confirmSetLocation('{$message}', '{$url}')"
            ]
        );
    } elseif ($order->getStatus() == 'approved') {

        $url = $view->getUrl('account/order/process') . $view->getOrderId();
        $view->addButton(
            'process',
            [
                'label' => __('On Process'),
                'class' => 'myclass',
                'onclick' => "confirmSetLocation('{$message}', '{$url}')"
            ]
        );
    } elseif ($order->getStatus() == 'processing') {
        $url = $view->getUrl('account/order/shipped') . $view->getOrderId();
        $view->addButton(
            'shipped',
            [
                'label' => __('Shipped'),
                'class' => 'myclass',
                'onclick' => "confirmSetLocation('{$message}', '{$url}')"
            ]
        );
    }


}
public function beforePushButtons(
\Magento\Backend\Block\Widget\Button\Toolbar\Interceptor $subject,
\Magento\Framework\View\Element\AbstractBlock $context,
\Magento\Backend\Block\Widget\Button\ButtonList $buttonList
) {

$this->_request = $context->getRequest();
if($this->_request->getFullActionName() == 'sales_order_view'){
$buttonList->add(
'approved',
['label' => __('Approve'), 'onclick' => 'setLocation(window.location.href)', 'class' => 'reset'],
-1
);

    $buttonList->add(
        'process',
        ['label' => __('On process'), 'onclick' => 'setLocation(window.location.href)', 'class' => 'reset'],
        -1
    );

    $buttonList->add(
        'shipped',
        ['label' => __(''), 'onclick' => 'setLocation(window.location.href)', 'class' => 'reset'],
        -1
    );
}

}
}
