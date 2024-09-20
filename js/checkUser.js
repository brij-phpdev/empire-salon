jQuery(document).ready(function ($) {
    
    
    function isValidMobileNumber(mobileNumber) {
        var mobileNumberPattern = /^[0-9]{10}$/;
        return mobileNumberPattern.test(mobileNumber);
    }
    
$('body').on('keyup', '#phone', function (e) {
                $('.success-mobile-update').html('');
                $('.error-mobile-update').html('');
                var last_visit = $("#last_visit").val();
                var name = $("#name").val();
                var mobile = $("#phone").val();
                var csrf_token = $("#csrf_token").val();
//                if (name == '') {
//                    alert('Kindly enter your name first');
//                    $("#name").focus();
//                    return false;
//                }
                
                
                if (mobile == '') {
//                    alert('Kindly enter mobile number first');
//                    console.log('Kindly enter mobile number first without "0" only 10 digit');
                    $("#phone_error").addClass('text-danger').text('Kindly enter mobile number first without "0" only 10 digit');
                    $("#phone").focus();
                    return false;
                } else if(mobile.length >= 10){
//                    alert(mobile.length);
//                    alert(mobile);
                    // lets check if number length is 10..
//                    if(mobile.length >= 10){
                        if(!isValidMobileNumber(mobile)){
//                            alert('invalid mobile number');
                            $("#phone_error").addClass('text-danger').text('Kindly enter mobile number first without "0" only 10 digit');
                            return false;
                        }
                    
                    
                    //validate user
                    
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                        },
                        method: "POST",
                        url: "checkUser.php",
                        data: {"mobile": mobile, "csrf_token": csrf_token,"last_visit": last_visit, "action":"check_user"}
                    }).done(function (json) {
                        msg = jQuery.parseJSON(json);
                        console.log(msg);
                        
                        if (msg.success === true && msg.success!==undefined) {
                            var user_details = msg.user_details;
                            $('.success-mobile-update').addClass('text-success').html( msg.message);
                            // means user already exists..
//                            alert(' means user already exists..');
//                            alert(msg.message);
                            // now set variable
//                            $("#email").val(user_details.email);
                            $("#register_button").hide();
                            $("#email").hide();
                            $("#name").hide();
//                            $("#unique_id").val(user_details.unique_id);
                            $("#forgot_link").show();
                            $("#login_link").show();
//                            alert(msg.message);

                        }else if (msg.return === true) {
                            // open OTP 
                            console.log('i m herer');
//                            alert(' send OTP');
                            $(".mobile_sms_otp").show();
                            $('.success-mobile-update').addClass('text-success').html( msg.message);
                            $("#verify-otp-fastsms").show();
                            $(".sent-otp-fastsms_submit").hide();
                            $("#sent-otp-fastsms").hide();
                            $("#verify-otp-fastsms").on("click", function () {
                                verifyMobileOTP();

                //                    createCookie('otppopup','no',0);
                            });
                        } else {
//                            alert(msg.status_code);
                            alert(msg.message);
                            $('.error-mobile-update').addClass('text-danger').html( msg.message);
                        }
                    });
                }
            });
            
            
            $("#getCoupons").on("click",function(){
                getCoupons();
            });
            
});


function getCoupons(){
     $.ajax({
            method: "GET",
            url: "getCoupons.php"
        }).done(function (json) {
            msg = jQuery.parseJSON(json);
                        console.log(msg);

            if (msg.success == true) {
                var coupon_details = msg.coupon_details;
                $('.success-mobile-update').addClass('text-success').html(msg.status + '! ' + msg.msg);
                // means user already exists..
//                alert(msg.msg);
                
                // now set variable
                $("#coupons_data").html(msg.coupon_details);
                
                $(".applyCoupon").on("click",function(){
                    var selected_coupon = $(this).attr('id');
                    $("#couponId").val(selected_coupon);
                    $("#coupons_applied").addClass('text-success').text('Coupon applied successfully!');
                    
                });

            } else {
//                            alert(msg.status_code);
                alert(msg.message);
                $('.error-mobile-update').addClass('text-danger').html( msg.msg);//msg.status + '! ' +
            }
        });
}


function verifyMobileOTP() {
//        alert('verifying SMS');
    $(".fancy_msg").hide();
    $(".fancy_msg").slideUp();
    var mobile = $("#phone").val();
    var mobile_otp = $(".mobile_sms_input").val();
    var csrf_token = $("#csrf_token").val();
//        alert(mobile);
//        alert(mobile_otp);
    $.ajax({
        url:  'checkUser.php',
        type:'POST',
        data: {
            action: 'verify_mobile_otp',
            mobile: mobile,
            mobile_otp: mobile_otp,
            csrf_token: csrf_token,
            ajax: true
        },
        beforeSend: function () {
            $(".waitSpinner").show();
        },
        success: function (json)
        {
            var data = jQuery.parseJSON(json);
//            console.log(data);
//            alert(data.success);
//            $(".waitSpinner").hide();
            if (data.success === true && data.success!==undefined) {
                $(".error-mobile-update").hide();
                $('.success-mobile-update').show().addClass('text-success').text( data.message);
                $("#is_mobile_verified").val('1');
                $(".error-mobile-update").hide();
                $(".mobile_sms_input").hide();
                $(".mobile_sms_input").hide();
                $("#verify-otp-fastsms").hide();
                $("#register_button").show();
                $("#email_cont").show();
                $("#name_cont").show();
                $("#pwd_cont").show();
//                alert('we are here');
//                $(".fancy_msg").text(data.message+'. Redirecting in 3 seconds');
                return false;
//                createCookie('otppopup', 'no', 30);
//                $("#popupLogin").stop().slideToggle('slow');
                // redirect to the href 
//                setTimeout(function () {
//                    window.location.href = 'payscript.php';
//                }, 3000); //will call the function after 3 secs.

//                window.location.href = $smsLinkHref;


            } else {
//                $(".fancy_msg").removeClass('alert-success');
//                $(".fancy_msg").addClass('alert-danger');
                $('.success-mobile-update').hide();
                $(".error-mobile-update").addClass('text-danger').text(data.message);
            }
        }
    });

}
