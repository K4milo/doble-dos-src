require([
    'jquery',

    'mage/utils/wrapper',
    'Magento_Ui/js/form/form',
    'Magento_Customer/js/model/customer',
    'Magento_Customer/js/model/address-list',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/action/create-billing-address',
    'Magento_Checkout/js/action/select-billing-address',
    'Magento_Checkout/js/model/shipping-service',
    'Magento_Checkout/js/model/shipping-rate-registry',
    'Magento_Checkout/js/model/shipping-rate-processor/customer-address',
    'Magento_Checkout/js/model/shipping-rate-processor/new-address',
    'mage/translate',
], function ($, wrapper, Component, customer, addressList , quote, createBillingAddress, selectBillingAddress, shippingService, rateRegistry, customerAddressProcessor, newAddressProcessor ,$t) {


newAddressOption = {
            /**
             * Get new address label
             * @returns {String}
             */
            getAddressInline: function () {
                return $t('New Address');
            },
            customerAddressId: null
        }
 var ctry = $("[name='country_id']").val();
 if(ctry != ""){
    if(ctry == "CO"){
        $('[name="shippingAddress.city2"]').show(); 
                $('[name="shippingAddress.city"]').hide(); 

 }
 }
 

      $('[name="shippingAddress.city2"]').hide(); 
       // $('[name="shippingAddress.hiddenvalue"]').hide();
 $(document).on('change',"[name='country_id']",function(){
    
    
    var ctry = $(this).val();
        if(ctry == 'CO'){
                $('[name="shippingAddress.city2"]').show(); 
                $('[name="shippingAddress.city"]').hide(); 
              
             


        }else{

                $('[name="shippingAddress.city2"]').hide(); 
                $('[name="shippingAddress.city"]').show(); 
        }

 });


	$('.action-select-shipping-items').on('click' , function(){
	
	 rateRegistry.set(quote.shippingAddress().getCacheKey(), null);

       processors.default =  newAddressProcessor;
       processors['customer-address'] = customerAddressProcessor;
     var type = quote.shippingAddress().getType();

      if (processors[type]) {
          processors[type].getRates(quote.shippingAddress());
       } else {
          processors.default.getRates(quote.shippingAddress());
       }

   var address = quote.shippingAddress();


    // changes the object so observable sees it as changed
    address.trigger_reload = new Date().getTime();

    // create rate registry cache
    // the two calls are required 
    // because Magento caches things
    // differently for new and existing
    // customers (a FFS moment)
     rateRegistry.set(address.getKey(), null);
     console.log(address.getKey());
    rateRegistry.set(address.getCacheKey(), null);

    // with rates cleared, the observable listeners should
    // update everything when the rates are updated
    quote.shippingAddress(address);


});

  var processors = [];
    $(document).on('change',"[name='city2']",function(){

         // rateRegistry.set(quote.shippingAddress().getCacheKey(), null);

     //   processors.default =  newAddressProcessor;
     //   processors['customer-address'] = customerAddressProcessor;
     // var type = quote.shippingAddress().getType();

      // if (processors[type]) {
      //     processors[type].getRates(quote.shippingAddress());
      //  } else {
      //     processors.default.getRates(quote.shippingAddress());
      //  }
        var tetxval = $(this).find(':selected').text();
       var streetaddress= tetxval.substr(0, tetxval.indexOf('(')); 
        $('input[name="city"]').val(streetaddress +' ,' + $(this).val());
             $("input[name='city']").triggerHandler("focus");
         $("input[name='city']").trigger("click");
         $("input[name='city']").trigger("keypress");
         $("input[name='city']").trigger("keyup");
         $("input[name='city']").trigger("blur");


   
   setTimeout(function(){  
    $("[name='country_id']").val('YT');
     $("[name='country_id']").trigger("change");
    $("[name='country_id']").val('CO');
     $("[name='country_id']").trigger("change");
      }, 1000);
        
    



/*
   var address = quote.shippingAddress();


    //changes the object so observable sees it as changed
    address.trigger_reload = new Date().getTime();

    //create rate registry cache
    //the two calls are required 
    //because Magento caches things
    //differently for new and existing
    //customers (a FFS moment)
     rateRegistry.set(address.getKey(), null);
     console.log(address.getKey());
    rateRegistry.set(address.getCacheKey(), null);

    //with rates cleared, the observable listeners should
    //update everything when the rates are updated
    quote.shippingAddress(address); */





            });
$(document).on('click','.action-select-shipping-item',function(){


        rateRegistry.set(quote.shippingAddress().getCacheKey(), null);

       processors.default =  newAddressProcessor;
       processors['customer-address'] = customerAddressProcessor;
     var type = quote.shippingAddress().getType();

      if (processors[type]) {
          processors[type].getRates(quote.shippingAddress());
       } else {
          processors.default.getRates(quote.shippingAddress());
       }



   var address = quote.shippingAddress();


    //changes the object so observable sees it as changed
    address.trigger_reload = new Date().getTime();

    //create rate registry cache
    //the two calls are required 
    //because Magento caches things
    //differently for new and existing
    //customers (a FFS moment)
     rateRegistry.set(address.getKey(), null);
     console.log(address.getKey());
    rateRegistry.set(address.getCacheKey(), null);

    //with rates cleared, the observable listeners should
    //update everything when the rates are updated
    quote.shippingAddress(address); 

});
});