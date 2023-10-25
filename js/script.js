jQuery(document).ready(function ($) {

  //удалить при натяжке
  $(document).on('click', '.send', function (e){
    e.preventDefault();
    $.fancybox.close();
    $.fancybox.open( $('#send-ok'), {
      touch:false,
      autoFocus:false,
    });
  })





  //select
  $('select').niceSelect();
  //animate number
  var textPos = $('.content-number').offset().top;
  $(window).scroll(function() {

    var topOfWindow = $(window).scrollTop();

    if($('.content-number').hasClass('stop')){
      return;
    }

    if (textPos < topOfWindow + 500) {
      $('.content-number .item-1 .h6 span').animateNumber({
        number: 28
      },1500);
      $('.content-number .item-2 .h6 span').animateNumber({
        number: 200
      },2000);
      $('.content-number .item-3 .h6 span').animateNumber({
        number: 1995
      },2500);
      $('.content-number .item-4 .h6 span').animateNumber({
        number: 1.25,
        numberStep: function(now, tween) {
          var target = $(tween.elem)

          target

            .prop('number', now) // keep current prop value
            .text(now);
            //.text(now).val().substr(0,3);

        },

      },2000);

      $('.content-number .item-5 .h6 span').animateNumber({
        number: 1.5,
        numberStep: function(now, tween) {
          var target = $(tween.elem);

          target
            .prop('number', now) // keep current prop value
            .text(now);
        },
      },3000);
      $('.content-number').addClass('stop');
    }
  });



  //MOVE IMG

  var lFollowX = 0,
    lFollowY = 0,
    x = 0,
    y = 0,
    friction = 1 / 30;

  function moveBackground() {
    x += (lFollowX - x) * friction;
    y += (lFollowY - y) * friction;

    translate = 'translate(' + x + 'px, ' + y + 'px) scale(1)';

    $('.title-text-img .bg img').css({
      '-webit-transform': translate,
      '-moz-transform': translate,
      'transform': translate
    });

    window.requestAnimationFrame(moveBackground);
  }

  $(window).on('mousemove click', function(e) {

    var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
    var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
    lFollowX = (20 * lMouseX) / 50; // 100 : 12 = lMouxeX : lFollow
    lFollowY = (10 * lMouseY) / 50;

  });

  moveBackground();


  //popup
  $(".fancybox").fancybox({
    touch:false,
    autoFocus:false,
  });

  //tel code
  if($('.input-wrap-tel input').length > 0){
    var input = document.querySelector("#tel");
    window.intlTelInput(input, {
      //allowDropdown: true,
      //autoHideDialCode: true,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["ru"],
      // formatOnDisplay: false,
      /*    geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              callback(countryCode);
            });
          },*/
      // hiddenInput: "full_number",
      //initialCountry: "auto",
      localizedCountries: { 'md': 'Moldova' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      preferredCountries: ['md'],
      InitialCountry: "",
      separateDialCode: true,

    });
  }

  /* mob-menu*/
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-responsive'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('body').addClass('is-active');
      $('html').addClass('is-menu');
      $('header').addClass('is-active');
    }, 100);

  });

  /*close mob menu*/
  $(document).on('click', '.close-menu a', function (e){
    e.preventDefault();
    $('body').removeClass('is-active');
    $.fancybox.close();
    $('header').removeClass('is-active');
    $('html').removeClass('is-menu');
  });

  //animation
  AOS.init({
    duration: 800,
    disable: 'mobile', // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  });

});