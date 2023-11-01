  (function($){
    $.fn.extend({
        donetyping: function(callback,timeout){
            timeout = timeout || 1e3; // 1 second default timeout
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                // Chrome Fix (Use keyup over keypress to detect backspace)
                // thank you @palerdot
                $el.is(':input') && $el.on('keyup keypress paste',function(e){
                    // This catches the backspace button in chrome, but also prevents
                    // the event from triggering too preemptively. Without this line,
                    // using tab/shift+tab will make the focused element fire the callback.
                    if (e.type=='keyup' && e.keyCode!=8) return;
                    
                    // Check if timeout has been set. If it has, "reset" the clock and
                    // start over again.
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){
                        // if we made it here, our timeout has elapsed. Fire the
                        // callback
                        doneTyping(el);
                    }, timeout);
                }).on('blur',function(){
                    // If we can, fire the event since we're leaving the field
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);

function IsEmail(email) {
          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(!regex.test(email)) {
            return false;
          }else{
            return true;
          }
        }

jQuery(document).ready(function(){

    var attributeValue = 'type-of-book';
  var $element = jQuery('[for="' + attributeValue + '"]');

  // Check if the element exists
  if ($element.length > 0) {
    // Change the text of the element
    $element.text('Options');
  }

/****/

 /****/
    //EditAccountForm select currency disabled
    jQuery('.woocommerce-MyAccount-content .woocommerce-EditAccountForm #wcpay_selected_currency').prop('disabled', 'disabled');

   if(jQuery("body").hasClass("page-id-18863")){
    jQuery('#billing_state').select2();
    jQuery('#shipping_state').select2();
   }

    jQuery('#billing_state').on('select2:select', function (e) {
        if (jQuery('#billing_state').val() === null) {
            jQuery('#billing_state').addClass('errorInput');
            jQuery('.error_billing_state').text('Please enter state.');
        } else {
            jQuery('#billing_state').removeClass('errorInput');
            jQuery('.error_billing_state').text('');
        }
    });

    jQuery('#billing_state').on('select2:unselect', function (e) {
        if (jQuery('#billing_state').val() === null) {
            jQuery('#billing_state').addClass('errorInput');
            jQuery('.error_billing_state').text('Please enter state.');
        } else {
            jQuery('#billing_state').removeClass('errorInput');
            jQuery('.error_billing_state').text('');
        }
    });

    jQuery('#shipping_state').on('select2:select', function (e) {
        if (jQuery('#shipping_state').val() === null) {
            jQuery('#shipping_state').addClass('errorInput');
            jQuery('.error_shipping_state').text('Please enter state');
        } else {
            jQuery('#shipping_state').removeClass('errorInput');
            jQuery('.error_shipping_state').text('');
        }
    });

    jQuery('#shipping_state').on('select2:unselect', function (e) {
        if (jQuery('#shipping_state').val() === null) {
            jQuery('#shipping_state').addClass('errorInput');
            jQuery('.error_shipping_state').text('Please enter state');
        } else {
            jQuery('#shipping_state').removeClass('errorInput');
            jQuery('.error_shipping_state').text('');
        }
    });

    //do typing js checkout field
    jQuery('#billing_first_name').donetyping(function(){
       var billing_first_name = jQuery('#billing_first_name').val();
       if(billing_first_name == ""){
          jQuery('#billing_first_name').addClass('errorInput');
          jQuery('.errorFname').text('Please enter your first name');
        } else{
          jQuery('#billing_first_name').removeClass('errorInput');
          jQuery('.errorFname').text('');
        }
    });
    jQuery('#billing_last_name').donetyping(function(){
       var billing_last_name = jQuery('#billing_last_name').val();
       if(billing_last_name == ""){
          jQuery('#billing_last_name').addClass('errorInput');
          jQuery('.errorLname').text('Please enter your first name');
        } else{
          jQuery('#billing_last_name').removeClass('errorInput');
          jQuery('.errorLname').text('');
        }
    });
    jQuery('#billing_address_1').donetyping(function(){
       var billing_address_1 = jQuery('#billing_address_1').val();
       if(billing_address_1 == ""){
          jQuery('#billing_address_1').addClass('errorInput');
          jQuery('.error_billing_address_1').text('Please enter street address.');
        } else{
          jQuery('#billing_address_1').removeClass('errorInput');
          jQuery('.error_billing_address_1').text('');
        }
    });
    jQuery('#billing_city').donetyping(function(){
       var billing_city = jQuery('#billing_city').val();
       if(billing_city == ""){
          jQuery('#billing_city').addClass('errorInput');
          jQuery('.error_billing_city').text('Please enter city.');
        } else{
          jQuery('#billing_city').removeClass('errorInput');
          jQuery('.error_billing_city').text('');
        }
    });

    jQuery('#billing_postcode').donetyping(function(){
       var billing_postcode = jQuery('#billing_postcode').val();
       if(billing_postcode == ""){
          jQuery('#billing_postcode').addClass('errorInput');
          jQuery('.error_billing_postcode').text('Please enter postcode.');
        } else{
          jQuery('#billing_postcode').removeClass('errorInput');
          jQuery('.error_billing_postcode').text('');
        }
    });
    jQuery('#billing_phone').donetyping(function(){
       var billing_phone = jQuery('#billing_phone').val();
       if(billing_phone == ""){
          jQuery('#billing_phone').addClass('errorInput');
          jQuery('.error_billing_phone').text('Please enter phone.');
        } else{
           jQuery('#billing_phone').removeClass('errorInput');
           jQuery('.error_billing_phone').text('');
        }
    });
    jQuery('#billing_email').donetyping(function(){
       var billing_email = jQuery('#billing_email').val();
       if(billing_email == ""){
          jQuery('#billing_email').addClass('errorInput');
          jQuery('.error_billing_email').text('Please enter email.');
        }else if(IsEmail(billing_email)==false){
          jQuery('#billing_email').addClass('errorInput');
          jQuery('.error_billing_email').text('Please enter valid email.');
        } else{
          jQuery('#billing_email').removeClass('errorInput');
          jQuery('.error_billing_email').text('');
        }
    });

    setInterval(function () {
      var billing_email = jQuery('#billing_email').val();
      if(IsEmail(billing_email)!=false){
        jQuery('#billing_email').removeClass('errorInput');
        jQuery('.error_billing_email').text('');
      }
    }, 1000);

    //shipping do type
     jQuery('#shipping_first_name').donetyping(function(){
       var shipping_first_name = jQuery('#shipping_first_name').val();
       if(shipping_first_name == ""){
          jQuery('#shipping_first_name').addClass('errorInput');
          jQuery('.error_shipping_first_name').text('Please enter first name');
        } else{
          jQuery('#shipping_first_name').removeClass('errorInput');
          jQuery('.error_shipping_first_name').text('');
        }
    });
    jQuery('#shipping_last_name').donetyping(function(){
       var shipping_last_name = jQuery('#shipping_last_name').val();
       if(shipping_last_name == ""){
          jQuery('#shipping_last_name').addClass('errorInput');
          jQuery('.error_shipping_last_name').text('Please enter last name');
        } else{
          jQuery('#shipping_last_name').removeClass('errorInput');
          jQuery('.error_shipping_last_name').text('');
        }
    });
    jQuery('#shipping_address_1').donetyping(function(){
       var shipping_address_1 = jQuery('#shipping_address_1').val();
       if(shipping_address_1 == ""){
          jQuery('#shipping_address_1').addClass('errorInput');
            jQuery('.error_shipping_address_1').text('Please enter address 1');
        } else{
           jQuery('#shipping_address_1').removeClass('errorInput');
            jQuery('.error_shipping_address_1').text('');
        }
    });
    jQuery('#shipping_city').donetyping(function(){
       var shipping_city = jQuery('#shipping_city').val();
       if(shipping_city == ""){
         jQuery('#shipping_city').addClass('errorInput');
            jQuery('.error_shipping_city').text('Please enter city');
        } else{
           jQuery('#shipping_city').removeClass('errorInput');
            jQuery('.error_shipping_city').text('');
        }
    });
    jQuery('#shipping_postcode').donetyping(function(){
       var shipping_postcode = jQuery('#shipping_postcode').val();
       if(shipping_postcode == ""){
         jQuery('#shipping_postcode').addClass('errorInput');
         jQuery('.error_shipping_postcode').text('Please enter postcode');
        } else{
          jQuery('#shipping_postcode').removeClass('errorInput');
          jQuery('.error_shipping_postcode').text('');
        }
    });

    /****/

     jQuery("#billing_first_name").after('<p class="error-message errorFname"></p>');
     jQuery("#billing_last_name").after('<p class="error-message errorLname"></p>');
     jQuery("#billing_address_1").after('<p class="error-message error_billing_address_1"></p>');
     jQuery("#billing_city").after('<p class="error-message error_billing_city"></p>');
     jQuery("#billing_state_field span.select2.select2-container").after('<p class="error-message error_billing_state"></p>');
     jQuery("#billing_postcode").after('<p class="error-message error_billing_postcode"></p>');
     jQuery("#billing_phone").after('<p class="error-message error_billing_phone"></p>');
     jQuery("#billing_email").after('<p class="error-message error_billing_email"></p>');

     jQuery("#shipping_first_name").after('<p class="error-message error_shipping_first_name"></p>');
     jQuery("#shipping_last_name").after('<p class="error-message error_shipping_last_name"></p>');
     jQuery("#shipping_address_1").after('<p class="error-message error_shipping_address_1"></p>');
     jQuery("#shipping_city").after('<p class="error-message error_shipping_city"></p>');
     jQuery("#shipping_state_field span.select2.select2-container").after('<p class="error-message error_shipping_state"></p>');
     jQuery("#shipping_postcode").after('<p class="error-message error_shipping_postcode"></p>');

    jQuery('form.checkout').on('submit', function() {
        var isValid = true;
        // Perform validation for billing fields
        if (jQuery('#billing_first_name').val() === '') {
            isValid = false;
            jQuery('#billing_first_name').addClass('errorInput');
            jQuery('.errorFname').text('Please enter your first name');
        }else{
            jQuery('#billing_first_name').removeClass('errorInput');
            jQuery('.errorFname').text('');
        }
        if (jQuery('#billing_last_name').val() === '') {
            isValid = false;
            jQuery('#billing_last_name').addClass('errorInput');
            jQuery('.errorLname').text('Please enter your first name');
        }else{
            jQuery('#billing_last_name').removeClass('errorInput');
            jQuery('.errorLname').text('');
        }
        if (jQuery('#billing_address_1').val() === '') {
            isValid = false;
            jQuery('#billing_address_1').addClass('errorInput');
            jQuery('.error_billing_address_1').text('Please enter street address.');
        }else{
            jQuery('#billing_address_1').removeClass('errorInput');
            jQuery('.error_billing_address_1').text('');
        }
        if (jQuery('#billing_city').val() === '') {
            isValid = false;
            jQuery('#billing_city').addClass('errorInput');
            jQuery('.error_billing_city').text('Please enter city.');
        }else{
            jQuery('#billing_city').removeClass('errorInput');
            jQuery('.error_billing_city').text('');
        }
        if (jQuery('#billing_state').val() === '') {
            isValid = false;
            jQuery('#billing_state').addClass('errorInput');
            jQuery('.error_billing_state').text('Please enter state.');
        }
        else{
            jQuery('#billing_state').removeClass('errorInput');
            jQuery('.error_billing_state').text('');
        }
        if (jQuery('#billing_postcode').val() === '') {
            isValid = false;
            jQuery('#billing_postcode').addClass('errorInput');
            jQuery('.error_billing_postcode').text('Please enter postcode.');
        }
        else{
            jQuery('#billing_postcode').removeClass('errorInput');
            jQuery('.error_billing_postcode').text('');
        }
        if (jQuery('#billing_phone').val() === '') {
            isValid = false;
            jQuery('#billing_phone').addClass('errorInput');
            jQuery('.error_billing_phone').text('Please enter phone.');
        }
        else{
            jQuery('#billing_phone').removeClass('errorInput');
            jQuery('.error_billing_phone').text('');
        }
        if (jQuery('#billing_email').val() === '') {
            isValid = false;
            jQuery('#billing_email').addClass('errorInput');
            jQuery('.error_billing_email').text('Please enter email.');
        }else{
            jQuery('#billing_email').removeClass('errorInput');
            jQuery('.error_billing_email').text('');
        }

        // Perform validation for shipping fields
        if (jQuery('#shipping_first_name').val() === '') {
            isValid = false;
            jQuery('#shipping_first_name').addClass('errorInput');
            jQuery('.error_shipping_first_name').text('Please enter first name');
        }else{
            jQuery('#shipping_first_name').removeClass('errorInput');
            jQuery('.error_shipping_first_name').text('');
        }
        if (jQuery('#shipping_last_name').val() === '') {
            isValid = false;
            jQuery('#shipping_last_name').addClass('errorInput');
            jQuery('.error_shipping_last_name').text('Please enter last name');
        }else{
            jQuery('#shipping_last_name').removeClass('errorInput');
            jQuery('.error_shipping_last_name').text('');
        }
        if (jQuery('#shipping_address_1').val() === '') {
            isValid = false;
            jQuery('#shipping_address_1').addClass('errorInput');
            jQuery('.error_shipping_address_1').text('Please enter address 1');
        }else{
            jQuery('#shipping_address_1').removeClass('errorInput');
            jQuery('.error_shipping_address_1').text('');
        }
        if (jQuery('#shipping_city').val() === '') {
            isValid = false;
            jQuery('#shipping_city').addClass('errorInput');
            jQuery('.error_shipping_city').text('Please enter city');
        }else{
            jQuery('#shipping_city').removeClass('errorInput');
            jQuery('.error_shipping_city').text('');
        }
        if (jQuery('#shipping_state').val() === '') {
            isValid = false;
            jQuery('#shipping_state').addClass('errorInput');
            jQuery('.error_shipping_state').text('Please enter state');
        }else{
            jQuery('#shipping_state').removeClass('errorInput');
            jQuery('.error_shipping_state').text('');
        }
        if (jQuery('#shipping_postcode').val() === '') {
            isValid = false;
            jQuery('#shipping_postcode').addClass('errorInput');
            jQuery('.error_shipping_postcode').text('Please enter postcode');
        }else{
            jQuery('#shipping_postcode').removeClass('errorInput');
            jQuery('.error_shipping_postcode').text('');
        }
        
        return isValid;
    });

    /****/
   jQuery('input.qty').on('change keyup', function() {
   var sanitizedNyum = jQuery(this).val().replace(/[^0-9]/g, '');
   jQuery(this).val(sanitizedNyum);
   });
  /****/

jQuery("div#widgetAccordion a.d-flex.align-items-center.justify-content-between.text-dark").click();
/****/
jQuery("table.variations tr:first-child li:first-child").click(function(){
  setTimeout(function(){
   jQuery("table.variations tr:nth-child(2) li:first-child").click();
   }, 100);
});
/****/
  jQuery('div#accordionExample .card-header button').on('click', function() {
     setTimeout(function(){
      jQuery('html, body').animate({
           scrollTop: jQuery(".collapse.show").offset().top-220
     }, 400);
        }, 500);
  });

/***/
jQuery('<p class="currencyLabel">Currency</p>').insertBefore(".woocommerce-multi-currency.wmc-price-switcher .wmc-current-currency");
/****/
 jQuery(".authorlistsCol").each(function() {
        if(jQuery(this).find("ul").is(':empty')){
            jQuery(this).remove();
        }
    });
/****/

});

jQuery(window).load(function() {
 setTimeout(function(){
  jQuery("#sco-loader").fadeOut(1000);
 		jQuery("body").removeClass('peloaderHome');
	 	}, 500);
});
/****/