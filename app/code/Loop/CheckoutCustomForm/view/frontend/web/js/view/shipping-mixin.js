
define([
    'jquery',
    'underscore',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/action/set-shipping-information',
    'Magento_Checkout/js/model/step-navigator',
    'Magento_Checkout/js/model/checkout-data-resolver',
    'Magento_Checkout/js/checkout-data',
    'uiRegistry',
    'Magento_Checkout/js/model/shipping-rate-service'
], function (
    $,
    _,
    quote,
    setShippingInformationAction,
    stepNavigator,
    checkoutDataResolver,
    checkoutData,
    registry,
) {
    'use strict';

    var mixin = {

        defaults: {
            template: 'Loop_CheckoutCustomForm/shipping'
        },

        setShippingInformation: function () {

            if (this.validateShippingInformation()) {
                quote.billingAddress(null);
                checkoutDataResolver.resolveBillingAddress();
                registry.async('checkoutProvider')(function (checkoutProvider) {
                    var shippingAddressData = checkoutData.getShippingAddressFromData();
                    localStorage['purpose'] = checkoutProvider.customCheckoutForm.checkout_purchase_order_no;

                    if (shippingAddressData) {
                        checkoutProvider.set(
                            'shippingAddress',
                            $.extend(true, {}, checkoutProvider.get('shippingAddress'), shippingAddressData)
                        );
                    }
                });
                const purpose = localStorage['purpose'];
                if (purpose !== "" && !purpose.match(/^[a-zA-Z]+$/) ) {
                    return false;
                }
                else {
                    setShippingInformationAction().done(
                        function () {
                            stepNavigator.next();
                        }
                    );
                }
                
            }
        }
    };

    return function (target) {
        return target.extend(mixin);
    };
});