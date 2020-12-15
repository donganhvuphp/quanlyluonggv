$(document).ready(function () {
   $('.check').mouseenter(function () {
      $('#pass').attr('type','text');
   });
   $('.check').mouseleave(function () {
      $('#pass').attr('type','password');
   });
});
$('.alert').delay(1500).slideUp();