// JavaScript Document
$(document).ready(function () {

    "use strict";

    /*----------------------------------------------------*/
    /*  Cntact Form Send Function
    /*----------------------------------------------------*/

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".contact-form").submit(function (e) {
        e.preventDefault();
        var name = $(".name");
        var email = $(".email");
        var subject = $(".subject");
        var msg = $(".message");
        var flag = false;
        if (name.val() == "") {
            name.closest(".form-control").addClass("error");
            name.focus();
            flag = false;
            return false;
        } else {
            name.closest(".form-control").removeClass("error").addClass("success");
        } if (email.val() == "") {
            email.closest(".form-control").addClass("error");
            email.focus();
            flag = false;
            return false;
        } else {
            email.closest(".form-control").removeClass("error").addClass("success");
        } if (msg.val() == "") {
            msg.closest(".form-control").addClass("error");
            msg.focus();
            flag = false;
            return false;
        } else {
            msg.closest(".form-control").removeClass("error").addClass("success");
            flag = true;
        }
        var dataString = "name=" + name.val() + "&email=" + email.val() + "&subject=" + subject.val() + "&msg=" + msg.val();
        let lang = $(this).attr('data-lang');

        $("#support_submit").attr('disabled', true);

        let msgs = {
            'loading': 'Loading...',
            'success': 'Mail sent Successfully',
            'fail': 'Mail not sent'
        }

        if (lang == 'ar') {
            msgs = {
                'loading': 'تحميل...',
                'success': 'تم إرسال البريد بنجاح',
                'fail': 'لم يتم إرسال البريد'
            }
        }
        $(".loading").fadeIn("slow").html(`${msgs.loading}`);
        $.ajax({
            type: "POST",
            data: dataString,
            url: "/send-support",
            cache: false,
            success: function (res) {
                $(".form-control").removeClass("success");
                if (res.status) // Message Sent? Show the 'Thank You' message and hide the form
                    $('.loading').fadeIn('slow').html('<font color="#48af4b">' + `${msgs.success}` + '</font>').delay(3000).fadeOut('slow');
                else
                    $('.loading').fadeIn('slow').html('<font color="#ff5607">' + `${msgs.fail}` + '</font>').delay(3000).fadeOut('slow');
                document.contactform.reset();
                $("#support_submit").removeAttr('disabled');

            }
        });
        return false;
    });

    $("#reset").on('click', function () {
        $(".form-control").removeClass("success").removeClass("error");
    });

    /*----------------------------------------------------*/
    /*  Contact Form Validation
    /*----------------------------------------------------*/

    let message = {
        name: {
            required: "Please enter no less than (1) characters"
        },
        email: {
            required: "We need your email address to contact you",
            email: "Your email address must be in the format of name@domain.com"
        },
        message: {
            required: "Please enter no less than (2) characters"
        }
    }

    let lang = $('.contact-form').attr('data-lang');

    if (lang == 'ar') {
        message = {
            name: {
                required: "من فضلك، أدخل لا يقل عن (1) حرفًا"
            },
            email: {
                required: "نحتاج إلى عنوان بريدك الإلكتروني للتواصل معك.",
                email: "يجب أن يكون عنوان بريدك الإلكتروني في صيغة name@domain.com"
            },
            message: {
                required: "من فضلك، أدخل لا يقل عن (2) حرفًا"
            }
        }
    }


    $(".contact-form").validate({
        rules: {
            name: {
                required: true,
                minlength: 1,
            },
            email: {
                required: true,
                email: true,
            },
            message: {
                required: true,
                minlength: 2,
            }
        },
        messages: message
    });

})



