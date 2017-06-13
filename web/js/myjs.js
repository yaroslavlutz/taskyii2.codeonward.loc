//document.addEventListener('DOMContentLoaded', function(){ });  //END document.addEventListener
jQuery(document).ready(function(){

    var heightScreen = 0;
    heightScreen = document.body.clientHeight; //Height of window client's browser  //763
//-----------------------------------------------------------------------------------------

/** HOME page */
    /** Remove flash-message "You have successfully signed up!" and "welcome User" in Home page, after registration and login in User */
    //setTimeout( function() {  $("p.flash_msg").remove().fadeOut("slow"); }, 3000);
/** __________________________________________________________________________________________________________________*/

/** REGISTRATION page */
    /** Phone Mask for input with telephone number in Registration form User */
    jQuery('#signup-mobile').each(function(){
        jQuery(this).mask("999-9999999");
    });
    jQuery('#signup-mobile')
        .addClass('rfield')
        .removeAttr('required')
        .removeAttr('pattern')
        .removeAttr('title')
        .attr({'placeholder':'___-_______'});
/** __________________________________________________________________________________________________________________*/

/** PROFILE page */
    /** Phone Mask for input with telephone number in Profile Edit form User */
    jQuery('#user-mobile').each(function(){
        jQuery(this).mask("999-9999999");
    });
    jQuery('#user-mobile')
        .addClass('rfield')
        .removeAttr('required')
        .removeAttr('pattern')
        .removeAttr('title')
        .attr({'placeholder':'___-_______'});

    jQuery('form#edit-profile-form-user #user-password').val(''); //Clear password input field


    jQuery('form#edit-profile-form-user .form-group label[for="user-src_avatar"]:after').css('content','');


    /** Validation of input fields Forms for emptiness: Output message of an empty input field */
    var interval = setInterval(function() {
        jQuery('form#edit-profile-form-user input[id^="user-"]:not(#user-src_avatar)').each(function(){
            var $this = jQuery(this);

            if( $this.val().length < 1 ){
                var $textLabelInput = $this.prev().text(); //Take the text from the labels of the inputs
                var $sumbolPosСolon = $textLabelInput.indexOf(':');
                $textLabelInput = $textLabelInput.substring(0,$sumbolPosСolon); //get the label text without colons

                $this.addClass('empty_field');
                $this.next().text( ' "'+$textLabelInput+'" '+' cannot be blank' );
            }
            else{
                $this.removeClass('empty_field');
                $this.next().text('');
            }

        });
    }, 1000); /* 1000 = 1 second */


    /** Validation of input fields Forms for emptiness: Disabled button type='submit'(button[name="form-button-edit-profile"]) */
    var $cntClass_empty_field = 0;
    var interval2 = setInterval(function() {
        jQuery('form#edit-profile-form-user input[id^="user-"]').each(function(){
            var $this = jQuery(this);

            if( $this.hasClass('empty_field') ) {
                ++$cntClass_empty_field; //console.log($cntClass_empty_field);
                jQuery('form#edit-profile-form-user button[name="form-button-edit-profile"]').attr('disabled',true);
                return false;
            }
            else {
                jQuery('form#edit-profile-form-user button[name="form-button-edit-profile"]').removeAttr('disabled');
                $cntClass_empty_field = 0;
            }
        });
    }, 1000); /* 1000 = 1 second */

    /** Confirm window - confirmation of action delete User Profile */
    jQuery('#btn_delete_profile_user').bind('click', function(event){ //console.log(event);
        if (confirm("Confirm to delete your profile?")) {
            return true;
        } else {
            return false;
            event.preventDefault();
          }
    });


    /** Validation of input field `Upload your avatar:` for image format check: Disabled button type='submit'(button[name="form-button-edit-profile"]) */
    var interval3 = setInterval(function() {
        jQuery('form#edit-profile-form-user input[id="user-src_avatar"]').change(function(){

            var $thisValueField = jQuery(this).val(); console.log($thisValueField);  //C:\fakepath\original.jpg
            if($thisValueField) {
                regex = /\.(\w*)/gi;
                var $extensionFile = $thisValueField.match(regex); console.log($extensionFile[0]);
            }

            if($thisValueField) {
                if( $extensionFile[0] !== '.gif' && $extensionFile[0] !== '.png' && $extensionFile[0] !== '.jpeg' && $extensionFile[0] !== '.jpg' ) {
                    jQuery(this).addClass('empty_field');
                    jQuery(this).next().text( 'Format image mast be: `gif`,`jpeg`,`jpg`,`png`' );
                }
                else{
                    jQuery(this).removeClass('empty_field');
                    jQuery(this).next().text('');
                }
            }
        });
    }, 1000); /* 1000 = 1 second */



/** __________________________________________________________________________________________________________________*/




/** For /module/admin/ for view: /module/admin/views/default/index.php
    Tooltip Example
*/ jQuery(document).ready(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();
   });

/** For /module/admin/ for view: /module/admin/views/default/index.php
    Popover Example
*/ jQuery(document).ready(function(){
    jQuery('[data-toggle="popover"]').popover( {html:true} );
   });

//-----------------------------------------------------------------------------------------




}); //__/(document).ready
