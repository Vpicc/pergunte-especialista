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

// Paginacao, adiciona bootstrap aos botoes
$('.page-numbers').addClass('btn');

// Submissao de Perguntas
$('#contact-form-pergunta').on('submit', function(e){

  e.preventDefault();
  $('.has-error').removeClass('has-error');
    tinymce.activeEditor.getBody().setAttribute('contenteditable', true);

  var form = $(this);

  var name = form.find('#name').val(),
      email = form.find('#email').val(),
      message = tinyMCE.activeEditor.getContent(),
      ajaxurl = form.data('url');

  // Checa se todos os campos foram preenchidos
  if(name === '' || email === '' || message === ''){
  if(name === ''){
    $('#name').parent('.form-group').addClass('has-error');
  }
  if(email === ''){
    $('#email').parent('.form-group').addClass('has-error');
  }
  if(message === ''){
    $('#warnmessage').addClass('has-error');
  }
  return;
}

  // Desativando inputs
  form.find('input, button, textarea').attr('disabled','disabled');
  tinymce.activeEditor.getBody().setAttribute('contenteditable', false);

  // Salvando dados
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
      // Erro
      $('.js-form-error').slideDown(300);
        form.find('input, button, textarea').removeAttr('disabled','disabled');
        tinymce.activeEditor.getBody().setAttribute('contenteditable', true);
    },
    success : function(response){
      if( response == 0){
        // Erro
        $('.js-form-error').slideDown(300);
        form.find('input, button, textarea').removeAttr('disabled','disabled');
        tinymce.activeEditor.getBody().setAttribute('contenteditable', true);
      } else {
        // Sucesso
        console.log('Mensagem salva!');
        $('.js-form-success').slideDown(300);
      }
    }
  });
});

}(jQuery));
