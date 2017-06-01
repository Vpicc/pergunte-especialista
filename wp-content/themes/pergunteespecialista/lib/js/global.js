// Scripts globais
jQuery(document).ready(function($){
  'use strict';

  // Slider
  $(document).ready(function(){
  $('.bxslider').bxSlider({
    pause: 7000,
    speed: 1000,
    controls: true,
    auto: true,
    pager: false,
    autoHover: true,
  });
});
// Submissao de Perguntas
$('#contact-form-pergunta').on('submit', function(e){

  e.preventDefault();

  var form = $(this);

  var name = form.find('#name').val(),
      email = form.find('#email').val(),
      message = tinyMCE.activeEditor.getContent();;

  console.log(message);
  console.log(email);
  console.log(name);
});

}(jQuery));
