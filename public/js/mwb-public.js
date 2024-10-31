(function( $ ) {
     'use strict';
     
     /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */
     
     })( jQuery );
     jQuery(document).on('click', '.mwb-close', function(){
          jQuery('.mwb-mwnfw-notification__wrapper').fadeOut(500);
     });
     jQuery( function( $ ){
          function setCookie(cname, cvalue, exdays) {
               var d = new Date();
               d.setTime(d.getTime() + (exdays*mwmfw_param_public_min.mwb_mwnfw_show_notification_again_time*60*60*1000));
               var expires = "expires="+ d.toUTCString();
               document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
          }
          $(".mwb-mwnfw-close__propensity").on('click', function(){
               $(".mwb-mwnfw__propensity-wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_propensity_cookie', 'mwb_mwnfw_prop' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          $(".mwb-mwnfw-close__reward").on('click', function(){
               $(".mwb-mwnfw-reward__wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_reward_cookie', 'mwb_mwnfw_reward' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          $(".mwb-mwnfw-close__success").on('click', function(){
               $(".mwb-mwnfw-success__wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_success_cookie', 'mwb_mwnfw_success' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          $(".mwb-mwnfw-close__review").on('click', function(){
               $(".mwb-mwnfw-review__wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_review_cookie', 'mwb_mwnfw_review' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          $(".mwb-mwnfw-close__invite").on('click', function(){
               $(".mwb-mwnfw-invite__wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_invite_cookie', 'mwb_mwnfw_invite' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          $(".mwb-mwnfw-close__offer").on('click', function(){
               $(".mwb-mwnfw-offer__wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_offer_cookie', 'mwb_mwnfw_offer' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          $(".mwb-mwnfw-close__promotion").on('click', function(){
               $(".mwb-mwnfw-promotional__wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_promotion_cookie', 'mwb_mwnfw_promotion' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          $(".mwb-mwnfw-close__feedback").on('click', function(){
               $(".mwb-mwnfw-feedback__wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_feedback_cookie', 'mwb_mwnfw_feedback' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          
          $(".mwb-mwnfw-close__custom_preview").on('click', function(){
               $(".mwb-mwnfw-custom__wrapper").css('display','none');
          });
          $(".mwb-mwnfw-close__custom").on('click', function(){
               $(".mwb-mwnfw-custom__wrapper").css('display','none');
               setCookie( 'mwb_mwnfw_custom_cokkie', 'mwb_mwnfw_custom' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
          $(".mwb-mwnfw-noti-bar__close").on('click', function(){
               $("#mwb-mwnfw-noti-bar").css('display','none');
               setCookie( 'mwb_mwnfw_nav_cokkie', 'mwb_mwnfw_nav' + Math.floor(100000 + Math.random() * 900000), 1 );                    
          });
         
          if( mwmfw_param_public_min.mwb_mwnfw_enable_feedback ) {
               $("#mwb_mwnfw_submit_feedback").on('click', function( e ){
                    e.preventDefault();
                    var review_reason = $("input[name='mwb_mwnfw_feedback_modal']:checked").val();
                    var next_qstn = $("#mwb-mwnfw-custom-question").val();
                    var token_val = $("#feedback-captcha__token").val();
                    if ( '' == review_reason ) {
                         return;
                    }
                    $.ajax({
                         url: mwmfw_param_public_min.ajaxurl,
                         type: 'POST',
                         data: {
                              action : 'mwb_mnfw_save_feedback_details',
                              review_reason : review_reason,
                              next_qstn : next_qstn,
                              token_val : token_val,
                              nonce     : mwmfw_param_public_min.nonce,
                         },
                         success : function(msg) {
                              if( 'submitted' == msg ) {
                                   Swal.fire( {
                                        icon : 'success',
                                        title: mwmfw_param_public_min.feedback_submitted,
                                   } );
                              } else if( 'captcha-error' == msg ) {
                                   Swal.fire( {
                                        icon : 'error',
                                        title: mwmfw_param_public_min.captcha_text,
                                   } );                              
                              }
                          setCookie( 'mwb_mwnfw_feedback_cookie', 'mwb_mwnfw_feedback' + Math.floor(100000 + Math.random() * 900000), 1 );                    
                              
                         },
                         error: function(msg) {
                              alert(msg);
                         }
                    });
                    return;
               });
          }
               /* Exit intent event */
               jQuery('body').mouseleave(function () {
                    jQuery(".mwb-mwnfw-event__exit-intent").css('display', 'block'); 
               });
          
     });

     /* After scrolling page event*/
     jQuery(window).on('scroll', function() {
          var scroll_top = jQuery(this).scrollTop();
          if (scroll_top > 100){
               jQuery('.mwb-mwnfw-event__after-scroll').css('display', 'block');
          }
          else{
               jQuery('.mwb-mwnfw-event__after-scroll').css('display', 'none');
          }
     });

     /* On load event */
     jQuery(window).on('load', function(){
          jQuery('.mwb-mwnfw-event__page-load').css('display', 'block');
     });

     /* After 5 seconds of onload Event */
     jQuery(window).on('load', function(){
          setTimeout(function(){
          jQuery('.mwb-mwnfw-event__after-page-load').css('display', 'block');  
     }, 5000);     
     });