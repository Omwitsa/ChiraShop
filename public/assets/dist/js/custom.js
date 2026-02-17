
$(document).ready(function() {
  $('.user-credential').on('click', function() {
      $(this).addClass('active').siblings('div').removeClass('active');
  });
});
