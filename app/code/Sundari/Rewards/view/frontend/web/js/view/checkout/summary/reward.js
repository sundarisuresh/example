define(
    [
        'jquery',
        'Magento_Checkout/js/view/summary/abstract-total'
    ],
    function ($,Component) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Sundari_Rewards/checkout/summary/reward'
            },
            isDisplayedCustomdiscount : function(){
                return true;
            },
            getCustomDiscount : function(){
                // return '$10';
                return window.checkoutConfig.customerData.custom_attributes.reward.value;
            }
        });
    }
);
