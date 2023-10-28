jQuery(document).ready(function ($) {
//alert($("ul.menu-content li.verifyOTP a").attr("href"));
//window.location.href = $("ul.menu-content li.verifyOTP a").attr("href");
    
//    $('.open-popup-link').magnificPopup({
//                type:'inline',
//                midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
//          });
    
    $(".waitSpinner").hide();


    var $smsLink = $("a.verifyOTP");
    var $smsLinkHref = $smsLink.attr('href');
    $smsLink.attr('href', 'javascript:void(0)');
//    $smsLink.attr('data-link', $smsLinkHref);
//    $("ul.menu-content li.verifyOTP a").attr("href")
//    $smsLink.addClass('we can send SMS');
    $smsLink.on("click", function (e) {
        e.preventDefault();
        
//        alert('please proceed with sending OTP');
        showPopUp();
        return false;
    });

    $("#close-mobile-otp").on("click", function () {
//        $("#popupLogin").slideToggle();
//        $("#popupLogin").hide();
        $("#popupLogin").stop().slideToggle('slow');

    });
    $("#close_sms_popup").on("click", function () {
        $("#test-popup").hide();
        $("#sms-popup").hide();
        $(".html-code").hide();

    });

    $("#sent-otp-fastsms").on("click", function () {
        sendFastSMSOTP($smsLinkHref);
    });
});


function sendFastSMSOTP($smsLinkHref) {
//        alert('sending SMSM');
    $(".fancy_msg").slideUp();
    var mobile = $(".mobile_otp_input").val();
//        alert(mobile);
    $.ajax({
        url: 'sendSMS.php',
        dataType: 'json',
        type:'POST',
        data: {
            action: 'sent_mobile_otp',
            mobile: mobile,
            ajax: true,
        },
        beforeSend: function () {
            $(".waitSpinner").show();
        },
        success: function (json)
        {
            console.log(json);
            // display message
//                var json = $.parseJSON(data);
//                console.log(json.message);

            if (json.success == 'true' || json.success == true) {
                $(".fancy_msg").slideDown();
                $(".fancy_msg").show();
                $(".fancy_msg").removeClass('alert-*');
                $(".fancy_msg").addClass('alert-success');
                $(".fancy_msg").text(json.message);
            } else {
                $(".fancy_msg").removeClass('alert-success');
                $(".fancy_msg").addClass('alert-danger');
            }
            $(".fancy_msg").addClass(json.message);
            $(".mobile_sms_otp").show();
            $("#verify-otp-fastsms").show();
            $(".sent-otp-fastsms_submit").hide();
            $("#sent-otp-fastsms").hide();

            $("#verify-otp-fastsms").on("click", function () {
                verifyMobileOTP($smsLinkHref);

//                    createCookie('otppopup','no',0);
            });
//                $('.pos_content_product_cate').html(data.product_cate);
//            $(".waitSpinner").hide();
        }
    });

}


function verifyMobileOTP($smsLinkHref) {
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
                    window.location.href = $("a.verifyOTP").attr("data-link");
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

function showPopUp()
{
    
    // now check if cookie exists..
    var wantedCookie = readCookie('otppopup');
//    alert('wantedCookie' + wantedCookie);
    
    if(typeof wantedCookie === "undefined"){
//        alert('here undefined');
//        $("#popupLogin").stop().slideToggle('slow');
        $("#test-popup").stop().slideToggle('slow');
          
        return false;
    }
    if(wantedCookie==='no'){
                alert('cookie present redirect to link if saved in data-link');
        window.location.href = $("ul.menu-content li.verifyOTP a").attr("data-link");
    }else{
        //    $("#popupLogin").show();
//        $("#popupLogin").stop().slideToggle('slow');
        //    $("#popupLogin").slidedown();
    }

}

function readCookie(name){
    
    
//    var wantedCookie = Cookies.get('otppopup');
    var wantedCookie;
//    alert('wantedCookie when reading' + wantedCookie);
    return wantedCookie;
    
    
}


function showPopUpFancy()
{
    $.fancybox({
        'scrolling': 'no',
        'type': 'inline',
        'autoSize': false,
        'width': 611,
        'height': 450,
        'href': '#popupLogin'
    });
}

//    $("ul.menu-content li.verifyOTP a").click(function(e){
//        alert('herere');
//        e.preventDefault();
//        showPopUp();    
//        return false;
//    });



//<![CDATA[

function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else
        var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}


function readCookie_prev(name) {
    var nameEQ = name + "=";
    alert('nam,e'+name);
    alert('nm Eq' + nameEQ);
    
    var ca = document.cookie.split(';');
    
    if (typeof $.cookie(name) === 'undefined'){
        //no cookie
        alert('no cookie');
       } else {
        //have cookie
        alert('have cookie');
       }
    
    alert("ca Values all cookies"+ ca); // all cookie
    for (var i = 0; i < ca.length; i++) {
        var c = ca;
        alert('c chart: '+c.charAt(0));
        while (c.charAt(0) == ' ')
            c = c.substring(1, c.length);
        
        alert("index of: "+c.indexOf(nameEQ));
        
        if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length, c.length);
        alert(c.substring(nameEQ.length, c.length));
        
    }
    return null;
}

//]]>






//$.post("{$url_base|escape:'html':'UTF-8'}modules/posmegamenu/ajax_posmegamenu.php?secure_key={$secure_key|escape:'html':'UTF-8'}", order);
