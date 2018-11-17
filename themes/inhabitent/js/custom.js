(function($) {
  $(document).ready(function() {
    // code goes here
    const $icon = $('.icon-search');
    const $field = $('.search-field');

    $icon.on('click', function(event) {
      event.preventDefault();
      $field.toggle().focus();
    });

    $field.blur(function() {
      $field.hide();
    });
  });
})(jQuery);

//IIFE
//imediately invoked frunction expression
