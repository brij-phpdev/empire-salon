jQuery(document).ready(function ($) {
    
$('body').on('keyup', '#phone', function (e) {
                $('.success-mobile-update').html('');
                $('.error-mobile-update').html('');
                var last_visit = $("#last_visit").val();
                var name = $("#name").val();
                var mobile = $("#phone").val();
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
                } else {
                    //validate user
                    
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "checkUser.php",
                        data: {"mobile": mobile, "last_visit": last_visit}
                    }).done(function (json) {
                        msg = jQuery.parseJSON(json);
                        console.log(msg);
                        
                        if (msg.success == true) {
                            var user_details = msg.user_details;
                            $('.success-mobile-update').addClass('text-success').html(msg.status + '! ' + msg.msg);
                            // means user already exists..
                            alert(msg.msg);
                            // now set variable
                            $("#name").val(user_details.fullName);
                            $("#email").val(user_details.email);
                            $("#unique_id").val(user_details.unique_id);
//                            alert(msg.message);

                        }else if (msg.return == true) {
                            // open OTP 
                            $(".mobile_sms_otp").show();
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
                            $('.error-mobile-update').addClass('text-danger').html(msg.status + '! ' + msg.msg);
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
                alert(msg.msg);
                
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
                $('.error-mobile-update').addClass('text-danger').html(msg.status + '! ' + msg.msg);
            }
        });
}


function verifyMobileOTP() {
//        alert('sending SMSM');
//        alert($smsLinkHref);
//        alert($("a.verifyOTP").attr("data-link"));
    $(".fancy_msg").hide();
    $(".fancy_msg").slideUp();
    var mobile = $(".mobile_otp_input").val();
    var mobile_otp = $(".mobile_sms_input").val();
//        alert(mobile);
    $.ajax({
        url:  'sendSMS.php',
        dataType: 'json',
        type:'POST',
        data: {
            action: 'verify_mobile_otp',
            mobile: mobile,
            mobile_otp: mobile_otp,
            ajax: true,
        },
        beforeSend: function () {
            $(".waitSpinner").show();
        },
        success: function (data)
        {
            console.log(data);

//            $(".waitSpinner").hide();
            if (data.success == 'true' || data.success == true) {
                $(".fancy_msg").removeClass('alert-*');
                $(".fancy_msg").slideDown();
                $(".fancy_msg").show();
                $(".fancy_msg").addClass('alert-success');
                $(".fancy_msg").text(data.message+'. Redirecting in 3 seconds');

                createCookie('otppopup', 'no', 30);
                $("#popupLogin").stop().slideToggle('slow');
                // redirect to the href 
                setTimeout(function () {
                    window.location.href = 'payscript.php';
                }, 3000); //will call the function after 3 secs.

//                window.location.href = $smsLinkHref;


            } else {
                $(".fancy_msg").removeClass('alert-success');
                $(".fancy_msg").addClass('alert-danger');
                $(".fancy_msg").text(data.message);
            }
        }
    });

}
