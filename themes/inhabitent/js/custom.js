(function($) {
  $(document).ready(function() {
    // code goes here
    const $icon = $('.icon-search');
    const $field = $('.search-field');
    const bannerHome = $('.home-hero').height();
    const bannerAbout = 850;

    $icon.on('click', function(event) {
      event.preventDefault();
      $field.animate({ width: 'toggle' }).focus();
    });

    $field.blur(function() {
      $field.animate({ width: 'toggle' });
    });

    if (
      $('.flexed-header-home-ab').length ||
      $('.page-template-about .entry-header').length
    ) {
      $(window).scroll(function() {
        let yPos = $(window).scrollTop();

        if (yPos >= bannerAbout) {
          $('.flexed-header-home-ab').removeClass('flexed-header-home-ab');
          $('.nav-image-white').css('display', 'none');
          $('.flex-nav-image-home-ab').removeClass('flex-nav-image-home-ab');
          $('.flex-nav-home-ab').removeClass('flex-nav-home-ab');
        } else {
          $('.flexed-header').addClass('flexed-header-home-ab');
          $('.flex-nav').addClass('flex-nav-home-ab');
          $('.nav-image-white').css('display', 'block');
          $('.alt-home-img').addClass('flex-nav-image-home-ab');
        }
      });
    }
  });
})(jQuery);

//IIFE
//imediately invoked frunction expression
