<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

{{-- <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> --}}

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/HoldOn.min.js') }}"></script>
{{-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}
{{-- <script src="//code.tidio.co/briyvnne41o2if3epc5tykfzgnvokjel.js" async></script> --}}
<script>
    window.addEventListener('mouseover', initLandbot, {
        once: true
    });
    window.addEventListener('touchstart', initLandbot, {
        once: true
    });
    var myLandbot;

    function initLandbot() {
        if (!myLandbot) {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.addEventListener('load', function() {
                var myLandbot = new Landbot.Livechat({
                    configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-1477296-D9DV9JGAOK839C92/index.json',
                });
            });
            s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        }
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    var botmanWidget = {
        aboutText: 'Powered By WebTadka',
        introMessage: "✋ Hi! I'm form webtadka.com. How can I help you ?",
        title: 'Praveen from WebTadka',
        mainColor: '#0ea2bd',
        bubbleAvatarUrl: "{{ asset('assets/img/chat.png') }}",
        bubbleBackground: '#0ea2bd',
    };

    $(document).ready(function() {
        <?php
        if(\Request::is('/')){ ?>
        setTimeout(() => {
            botmanChatWidget.open();
        }, 15000);
        <?php
        }
        ?>
    });


    function holdOn() {
        HoldOn.open({
            theme: "sk-circle",
            message: 'You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message. Thanks for your patience ',
        });
    }

    function closeHoldOn() {
        HoldOn.close();
    }

    var iNumber = '';
    $(document).ready(function() {
        refreshChaptcha();
    });

    function refreshChaptcha() {
        iNumber = Math.floor(Math.random() * 10000);
        $(".divGenerateRandomValues").css({
            "background-image": 'url({{ asset('images/bg6.png') }})',
            'width': '200px',
            'height': '50px',
        });
        $(".divGenerateRandomValues").html("<input type='text' class='txtNewInput'></input>");
        $(".txtNewInput").css({
            'background': 'transparent',
            'font-family': 'Arial',
            'font-style': 'bold',
            'font-size': '40px'
        });
        $(".txtNewInput").css({
            'width': '200px',
            'border': 'none',
            'color': 'black'
        });
        $(".txtNewInput").val(iNumber);
        $(".txtNewInput").addClass('unselectable');
        $(".txtNewInput").prop('disabled', true);
    }

    $('#contactform').submit(function(e) {
        e.preventDefault();
        if ($(".textInput").val() != iNumber) {
            refreshChaptcha();
            $('.captcha-error').removeClass('d-none');
        } else {
            $('.captcha-error').addClass('d-none');
            let formdata = new FormData($('#contactform')[0]);
            formdata.append('action', 'lets-talk');
            $('.loading').removeClass('d-none');
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-lets-talk-and-client-support",
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('.captcha-error').addClass('d-none');
                    $('.loading').addClass('d-none');
                    if (response == 1) {
                        $('.sent-message').removeClass('d-none');
                        $('.error-message').addClass('d-none');
                        setTimeout(() => {
                            $('.sent-message').addClass('d-none')
                            $('#contactform').trigger('reset');
                            refreshChaptcha();
                        }, 3000);
                    } else {
                        $('.error-message').removeClass('d-none');
                        $('.sent-message').addClass('d-none');
                        setTimeout(() => {
                            $('.error-message').addClass('d-none')
                        }, 3000);
                    }
                }
            });
        }
    });

    $('#subscribeForm').submit(function(e) {
        e.preventDefault();
        holdOn();
        let formdata = new FormData($(this)[0]);
        $.ajaxSetup({
            headers: {
                'accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            type: "post",
            url: "/save-subscribe",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(response) {
                closeHoldOn();
                if (response.status) {
                    swal("Thanks!", response.message, "success");
                } else {
                    swal("Already Subscribed", response.message, "info");
                }
            }
        });
    });
</script>
