(function($) {
  $(document).ready(function() {
    // code goes here
    const $icon = $('.icon-search');
    const $field = $('.search-field');

    $icon.on('click', function(event) {
      event.preventDefault();
      $field.animate({ width: 'toggle' }).focus();
    });

    $field.blur(function() {
      $field.animate({ width: 'toggle' });
    });
  });
})(jQuery);

//IIFE
//imediately invoked frunction expression
