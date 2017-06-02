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
      message = tinyMCE.activeEditor.getContent(),
      ajaxurl = form.data('url');

  if(name === '' || email === '' || message === ''){
    console.log('Todos os campos devem ser preenchidos');
    return;
  }

  $.ajax({
    url : ajaxurl,
    type: 'post',
    data: {
      name : name,
      email : email,
      message : message,
      action : 'pergunteEspecialistaSaveUserContactForm'
    },
    error : function(response){
      console.log(response);
    },
    success : function(response){
      if( response == 0){
        console.log('Nao foi possivel salvar sua mensagem');
      } else {
        console.log('Mensagem salva!');
      }
    }
  });
  console.log(ajaxurl);
  console.log(message);
  console.log(email);
  console.log(name);
});

}(jQuery));
