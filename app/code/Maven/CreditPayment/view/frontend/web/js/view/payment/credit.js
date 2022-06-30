define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'credit',
                component: 'Maven_CreditPayment/js/view/payment/method-renderer/credit-method'
            }
        );
        return Component.extend({});
    }
);
