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

// var attrVal = jQuery(".variations td.label label.form-label").attr("for");
// if(attrVal == "type-of-book"){

// }


   jQuery('.customRelated ul').slick({
   slidesToShow: 4,
   slidesToScroll: 1,
    infinite: false,
   arrows: false,
   dots: false,
   responsive: [{
          breakpoint: 1281,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 801,
           settings: {
              slidesToShow: 2,
              slidesToScroll: 1
           }
        },
        {
           breakpoint: 601,
           settings: {
              slidesToShow: 1,
              slidesToScroll: 1
           }
        }]

 });

   /****/
   jQuery(".backhouse-gallery-slider ul.slick-dots").each(function(){
      var slideCount = jQuery(this).find('li').length;
      if(slideCount == 1){
         jQuery(this).hide();
      } 
   });
   jQuery(".sliderHome ul.slick-dots").each(function(){
      var slideCountHome = jQuery(this).find('li').length;
      if(slideCountHome == 1){
         jQuery('.sliderHome ul.slick-dots li').hide();
         jQuery('.sliderHome').addClass("bannerOneSlider");
      } 
   });
   /****/
      setInterval(function() {
         jQuery('span.isbn:empty').closest('tr.isbn_wrapper').remove();
      }, 1);
   /****/
      jQuery("header#site-header form#searchform .input-group").append('<span class="searchClose"><i class="fas fa-times ml-2"></i></span>');
      jQuery('span.searchClose i.fas.fa-times.ml-2').click(function(){
         jQuery('header#site-header input#s').val('');
      });
   /****/

      setInterval(function () {
         if(jQuery("aside#offcanvasNav").hasClass("fadeInLeft")){
            jQuery('body').addClass("u-unfold-opened");
         }
          if(jQuery("aside#offcanvasNav").hasClass("u-unfold--hidden")){
            jQuery('body').removeClass("u-unfold-opened");
         }
      }, 1);
/****/

    // Hook into WP Forms AJAX success event
    // jQuery(document).on('wpformsAjaxSubmitSuccess', function(event, response, form) {
    //   // Check if the AJAX submission was successful and if the form is available
    //   if (response.success && form.length) {
    //     // Show the form again after a slight delay (optional)
    //     setTimeout(function() {
    //       form.show();
    //     }, 1000); // Adjust the delay time as needed
    //   }
    // });
/****/
 jQuery("body.archive ul.products li").each(function(){
      var addToCartText = jQuery(this).find('.woocommerce-loop-product__hover .product__add-to-cart').text();
      if(addToCartText == "Select options"){
         jQuery(this).find('span.price.price-incl').addClass("hidePriceNew");
      } 
   });
 jQuery("body.single.single-product ul.products li").each(function(){
      var addToCartTextRelated = jQuery(this).find('.woocommerce-loop-product__hover .product__add-to-cart').text();
      if(addToCartTextRelated == "Select options"){
         jQuery(this).find('span.price.price-incl').addClass("hidePriceNew");
      } 
   });
 /*****/
jQuery('.woocommerce-cart td.product-quantity input.input-text.qty').attr("type","number");
jQuery(".woocommerce-breadcrumb").html(function() {
  return jQuery(this).html().replace("Lost password", "Forgot password");
});
 /****/
jQuery(".woocommerce-form input[type='password'], .woocommerce-form-row input[type='password']").after('<i class="toggle-hide-show eyesIcon fa fa-fw fa-eye-slash"></i>');
 /****/
 jQuery(".toggle-hide-show").click(function() {
    jQuery(this).toggleClass("fa-eye fa-eye-slash");
    input = jQuery(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
 /****/

//validation registration form
 var $regexname=/^[a-zA-Z ]*$/;

  jQuery('#userName').donetyping(function(){
    var newUserName = jQuery('#userName').val();
      if(newUserName == ""){
         jQuery("#accountCreateBtn").attr("disabled","disabled");
         jQuery('#username-error').text("Please enter username.");
          return false;
        }else{
          jQuery('#username-error').text("");
          jQuery("#accountCreateBtn").removeAttr("disabled","disabled");
          return true;
        }
    });

  jQuery('#userPass').donetyping(function(){
    var newUserPassword = jQuery('#userPass').val();
   if(newUserPassword == ""){
      jQuery('#password-error').text("Please enter your password.");
      jQuery("#accountCreateBtn").attr("disabled","disabled");
      return false;
    } else if(( newUserPassword.length < 6 ) || ( !newUserPassword.match(/[A-z]/) ) || ( !newUserPassword.match(/[A-Z]/) ) || ( !newUserPassword.match(/\d/) ) || (!newUserPassword.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) ){
       jQuery('#password-error').text("Please enter atleast 6 character with one special character and capital letter and number.");
       jQuery("#accountCreateBtn").attr("disabled","disabled");
        return false; 
    }
     else{
      jQuery("#accountCreateBtn").removeAttr("disabled","disabled");
      jQuery('#password-error').text("");
      return true;
    }
  });

   jQuery('#userEmail').donetyping(function(){
      var userEmail = jQuery('#userEmail').val();
       if(userEmail == ""){
          jQuery('#email-error').text("Please enter your email.");
          jQuery("#accountCreateBtn").attr("disabled","disabled");
          return false;
        } else if(IsEmail(userEmail)==false){
         jQuery("#accountCreateBtn").attr("disabled","disabled");
          jQuery('#email-error').text("Please enter a valid email.");
          return false; 
        } else{
         jQuery("#accountCreateBtn").removeAttr("disabled","disabled");
          jQuery('#email-error').text("");
         return true;
        }
  });

jQuery('#registration-form').on('submit', function(event) {
        event.preventDefault();

        var form = jQuery(this);
        var formData = form.serialize();

        jQuery.ajax({
            type: 'POST',
            url: pld_js_object.admin_ajax_url,
            data: formData + '&action=custom_user_registration',
            dataType: 'json',
            success: function(response) {
               if(response.data.errormsg != ''){
               jQuery('#commonResponse').text(response.data.errormsg);
                }
                if(response.data.successmsg){
                  var base_url = window.location.origin;
                  window.location.href = base_url+"/my-account/";
                  jQuery('#commonResponse').text(response.data.errormsg);
                }
            },
            error: function(response) {
                // Registration failed, handle error messages
             // var errors = response.responseJSON.data;
             //    for (var key in errors) {
             //        if (errors.hasOwnProperty(key)) {
             //            $('#' + key + '-error').text(errors[key]);
             //        }
             //    }
                
            }
        });
    });
 /****/

jQuery("form#loginFormPopup a.lost_password").click(function(){
 var base_url = window.location.origin;
 window.location.href = base_url+"/my-account/lost-password/";
});
/**Sticky js**/
 jQuery(window).scroll(function() {
    if (jQuery(document).scrollTop() > 50) {
      jQuery(".topbar").addClass("top-sticky");
      jQuery(".site-header").addClass("sticky");
      jQuery(".masthead").addClass("mast-sticky");
    } else {
      jQuery(".topbar").removeClass("top-sticky");
      jQuery(".site-header").removeClass("sticky");
      jQuery(".masthead").removeClass("mast-sticky");
    }
  });

/***/
jQuery("a#menuToggleMobile").click(function(){
  jQuery("body").toggleClass("menuToggleMob");
  jQuery(".site-navigation.siteNavigationCommon").slideToggle("slow");
});

 /****/
    //EditAccountForm select currency disabled
    jQuery('.woocommerce-MyAccount-content .woocommerce-EditAccountForm #wcpay_selected_currency').prop('disabled', 'disabled');

});

jQuery(window).load(function() {
 setTimeout(function(){
  jQuery("#sco-loader").fadeOut(1000);
 		jQuery("body").removeClass('peloaderHome');
	 	}, 500);
});
/****/
