jQuery( function( $ ){

     
     jQuery('.mwb-mwnfw-color-picker__dyanmic').wpColorPicker();
     jQuery("#mwb_mwnfw_show_custom_content").select2();
     jQuery("#mwb_mwnfw_notification_show_page").select2();     
     var i = 0;
     jQuery( document ).on( 'click', '#mwb_mwnfw_add_dyanmic_field', function( e ) {
		e.preventDefault();
          i++;
          var html_field = '<div class="mwb-mwnfw-dynamic-qa__wrapper" ><input type = "text" name="mwb_mwnfw_dynamic_qa_field[]" id="mwb_mwnfw_dynamic_qa_field"' + i + '><button class="mwb_mwnfw_remove_dynamic_qa_field" >X</button></div>';
          var targetEl = $('div#mwb-mwnfw-popup-dynamic-qa-text div#mwb_div_dynamic_qa');
          targetEl.append(html_field);
		
	} );
     jQuery( document ).on( 'click', '.mwb_mwnfw_remove_dynamic_qa_field', function( e ) {
         e.preventDefault();
        $(this).parent('div.mwb-mwnfw-dynamic-qa__wrapper').remove();
               
     });
     

     var allow_openmodal = mwnfw_admin_param_custom.mwnfw_cpt_check;
     if( allow_openmodal ) {

          $(document).on('click', '.page-title-action', function( e ){

               $("#mwb-mwnfw-notification__modal").dialog({
                    modal : true,
                    autoOpen : false,
                    show : {effect: "blind", duration: 800},
                    width : 700,
                    draggable : false,
               });
               e.preventDefault();
               $("#mwb-mwnfw-notification__modal").dialog( 'open' );
               
          });

          // preview js.
          $("#post-preview").attr("href", "javascript:void(0)");
          $("#post-preview").removeAttr('target');
          $("#post-preview").attr("id", "preview-mwb_notification");
          jQuery( document ).on( 'click', '#preview-mwb_notification', function( e ) {
               e.preventDefault();
               
               var check_val = $("#mwnfw_notification_type").val();
               if( 'custom' === check_val ) {
                    let content = $("#mwb_mwnfw_show_custom_content").val();
                    let height = $("#mwb_mwnfw_show_custom_height").val();
                    let width = $("#mwb_mwnfw_show_custom_width").val();
                    let np = $("#mwb_mwnfw_choose_notification_position").val();
                    let effect = $("#mwb_mwnfw_choose_notification_entry").val();
                    let direction = $("#mwb_mwnfw_choose_animation_direction").val();

                    let home_url = mwnfw_admin_param_custom.home_url;
                    let final_url = home_url + '?mwb_preview=custom_preview&content=' + content + '&height=' + height + '&width=' + width + '&np=' + np + '&entry=' + effect + '&direction=' + direction;
                     window.open(final_url, '_blank');
                    return;
               }
               var formdata = new FormData($("form#post")[0]);
               formdata.append('action','mwb_mwnfw_preview_notification_admin' );
               formdata.append('nonce',mwnfw_admin_param_custom.nonce );

               $.ajax({
                    url      : mwnfw_admin_param_custom.ajaxurl,
                    type     : 'POST',
                    data : formdata,
                    processData: false,
                    contentType: false,
                    success  : function(msg) {
                        $("#title-prompt-text").after(msg);
                    },
                    error: function(msg) {
                         alert(msg);
                    }
               });
              
          } );

          $('#publishing-action').after(mwnfw_admin_param_custom.reset_text);
     }
     $(document).on('change', '#mwb_mwnfw_choose_image', function( e ){
		var filedata = $('#mwb_mwnfw_choose_image')[0].files;
          var varform = new FormData($('body.post-type-mwb_notification form#post')[0]);
	
          var self = this;
          if (filedata.length > 0) {
               for (let i = 0; i <= filedata.length - 1; i++) {
     
                    const fsize = filedata.item(i).size;
                    const file = Math.round((fsize / 1024));
                    if (file >= 4096) {
                    alert(mwnfw_admin_param_custom.max_img_size);
                    return;
                    } else if (file < 50) {
                    alert(mwnfw_admin_param_custom.min_img_size);
                         
                         return;
                    } else {
                    varform.append('action', 'mwb_mwnfw_upload_nottification_image');
                    varform.append('nonce', mwnfw_admin_param_custom.nonce );			
                    $.ajax({
                         url: mwnfw_admin_param_custom.ajaxurl,
                         type: 'POST',
                         data: varform,
                         cache : false,
                         processData: false,
                         contentType: false,
                         dataType : 'json',
                         success : function(msg) {
                              $('#mwb_mwnfw_uploaded_image_url').val();
                              $('#mwb_mwnfw_uploaded_image_url').val(msg);

                              html_img = '<div class="mwb_mwnfw_image_show_wrapper"><div id="mwb_mwnfw_image_server_url" class="dashicons dashicons-no"></div><img height="100px" width="100px" src=' + msg +'></div>';
                              $("#mwnfw_show_uploaded_image").html(html_img);

		                    $( ".mwb_mwnfw_previous_img" ).css( 'display', 'none' );

                         },
                         error: function(msg) {
                              alert(msg);
                         }
                    });

               }
               }
          }	
	});
     jQuery( document ).on( 'click', '#mwb_mwnfw_image_server_url', function( e ) {
		jQuery( '#mwb_mwnfw_uploaded_image_url' ).val('');
		jQuery( this ).css( 'display', 'none' );
		jQuery( this ).nextAll('img:first').css( 'display', 'none' );

          
		
	} );

     /*SVG images*/
     jQuery('img.svg').each(function() {
          var $img = jQuery(this);
          var imgID = $img.attr('id');
          var imgClass = $img.attr('class');
          var imgURL = $img.attr('src');

          jQuery.get(imgURL, function(data) {
               var $svg = jQuery(data).find('svg');
               if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
               }
               if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
               }
               $svg = $svg.removeAttr('xmlns:a');
               $img.replaceWith($svg);

          }, 'xml');

     });
     var hide = mwnfw_admin_param_custom.hide_add_new_button_edit;
     if( hide ) {
          $(".page-title-action").css('display', 'none');          
     } 

     // Preview hide popup js
     $(document).on('click', '.mwb-mwnfw-close__propensity', function(){
          $(".mwb-mwnfw__propensity-wrapper").css('display','none');
                         
     });
     $(document).on('click', '.mwb-mwnfw-close__reward', function(){
          $(".mwb-mwnfw-reward__wrapper").css('display','none');
                    
     });
     $(document).on('click', '.mwb-mwnfw-close__success', function(){
          $(".mwb-mwnfw-success__wrapper").css('display','none');
                         
     });
     $(document).on('click', '.mwb-mwnfw-close__review', function(){
          $(".mwb-mwnfw-review__wrapper").css('display','none');
                    
     });
     $(document).on('click', '.mwb-mwnfw-close__invite', function(){
          $(".mwb-mwnfw-invite__wrapper").css('display','none');
                    
     });
     $(document).on('click', '.mwb-mwnfw-close__offer', function(){
          $(".mwb-mwnfw-offer__wrapper").css('display','none');
                    
     });
     $(document).on('click', '.mwb-mwnfw-close__promotion', function(){
          $(".mwb-mwnfw-promotional__wrapper").css('display','none');
                              
     });
     $(document).on('click', '.mwb-mwnfw-close__feedback' ,function(){
          $(".mwb-mwnfw-feedback__wrapper").css('display','none');
                              
     });

     $(document).on('click', '.mwb-mwnfw-close__custom', function(){
          $(".mwb-mwnfw-custom__wrapper").css('display','none');
     });

     $(document).on('click', '.mwb-mwnfw-noti-bar__close', function(){
          $("#mwb-mwnfw-noti-bar").css('display','none');
     });



     jQuery( document ).on( 'click', '#reset_notification_settings', function( e ) {
          e.preventDefault();
          let id = $(this).data('id');
          if( '' != id ) {
               $.ajax({
                    url      : mwnfw_admin_param_custom.ajaxurl,
                    type     : 'POST',
                    data     : {
                         action: 'mwb_mwnfw_reset_notification_settings',
                         nonce : mwnfw_admin_param_custom.nonce,
                         post_id : id,

                    },
                    success  : function(msg) {
                         location.reload();
                    },
                    error: function(msg) {
                         alert(msg);
                    }
                    });
          }         
     } );

})