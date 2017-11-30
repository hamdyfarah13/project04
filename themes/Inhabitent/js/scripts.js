jQuery( document ).ready(function($) {

  $('.fa-search').on('click', function() {
    $('.search-form').toggle();
    $('.search-form .search-field').focus();
  });

  $('.search-form .search-field').on('blur', function(){
    $('.search-form').toggle();
  });



});