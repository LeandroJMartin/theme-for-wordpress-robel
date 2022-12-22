$(document).ready(function () {

  /*-- Menu --*/
  $('.toggle').click(function() {
    $('#header').toggleClass('active');
    $(this).toggleClass('on')
  });

  $('#slide').owlCarousel({
      loop: true,
      margin: 1,
      mouseDrag: true,
      autoplay: false,
      dots: true,
      dotsData: true,
      smartSpeed: 1200,
      nav: true,
      responsiveClass: true,
      responsive: {
          0: {
              items: 1,
          },
          768: {
              items: 1,
          },
          1024: {
              items: 1
          }
      }
  });

  $(".g_modulos").owlCarousel({
    loop: false,
    margin: 1,
    mouseDrag: true,
    autoplay: false,
    dots: true,
    nav: false,
    items: 1,
  });

  $('.wrap_hover').hover(function(){
    $( ".img-banner" ).toggleClass('active');
  });

  function function_buttons_banners(){

    $('.owl-prev').after('<span>&nbsp</span>');
    $('.owl-prev').html('Anterior');
    $('.owl-next').html('Próximo');

  }function_buttons_banners();

  function atualiza_classes(acao, dir){

    let slide = $('#slide .owl-stage .active');

    if(acao === 'pull'){
      $('.owl-item').removeClass(['current-item', 'current', 'prev-item', 'next-item']);
    }

    if(acao === 'add'){

      if(dir === 'prev'){
        $(slide).addClass('current-item');
        $(slide).prev().addClass('prev-item');
      }

      if(dir === 'next'){
        $(slide).addClass('current');
        $(slide).next().addClass('next-item');
      }

    }
  }

  $('#prev').hover(function(){

    atualiza_classes('add', 'prev');

    $(this).mouseleave(function(){

      atualiza_classes('pull');

    })
  });

  $('#prev').on('click', function(e){

    e.preventDefault();

    $('.owl-prev').click();

    atualiza_classes('pull');

  });

  $('#next').hover(function(){

    atualiza_classes('add', 'next');

    $(this).mouseleave(function(){

      atualiza_classes('pull');

    })

  });

  $('#next').on('click', function(e){

    $('.owl-next').click();

    atualiza_classes('pull');

  });


  function adjust_position(){

    let larg = $(window).width();
    let total = larg - 1650;
    let margin = total / 2;

    if(larg > 1650){
      $('.adjust-left').css({'padding-left' : margin});
      $('.adjust-right').css({'padding-right' : margin});
    }
  }adjust_position();

  function msg_acceptance(){

    $('.msg').hide();
    let bt = $('.wpcf7-form .bt-sub label');

    $(bt).on('click', function(){

      if($('.check').not(":checked")){
        $('.msg').show();
        $('.msg').html('<p style="color:red">Preencha os campos e aceite os termos.<p>');
      }

    });

  }msg_acceptance();



  $('.check').on('change', function(){
    msg_acceptance();
  })



  function select_item_contacts(){

      let id = $(this).data('id');

      if($('#nav_itens li').hasClass('active')){
        $('#nav_itens li').removeClass('active');
      }

      $('.element').removeClass('active');
      $('.el-'+id).addClass('active');

      $(this).addClass('active');

  }

  function get_url_item_contacts(){

    let url = window.location.hash;
    let item;

    switch (url) {
      case '#onde-comprar':
        item = $('#1');
        select_item_contacts.call(item);
        break;
      case '#onde-encontrar':
        item = $('#2');
        select_item_contacts.call(item);
        break;
      case '#baixar-catalogo':
        item = $('#3');
        select_item_contacts.call(item);
        break;
      case '#sac':
        item = $('#4');
        select_item_contacts.call(item);
        break;
      default:
        item = $('#1');
        select_item_contacts.call(item);
    }

  }get_url_item_contacts();

  $(window).on('hashchange', function(){
    get_url_item_contacts();
    $('#header').removeClass('active');
    $('.toggle').removeClass('on');
  })

  $('#nav_itens li').on('click', function(){

    select_item_contacts.call(this);

  });



  function accordion(){

    $('.accordion-list > li > .answer').hide();
    $(".accordion-list > li:first-child").addClass('active');
    $(".accordion-list > li:first-child .answer").slideDown();

    $('.accordion-list > li').click(function() {

      if ($(this).hasClass("active")) {

        $(this).removeClass("active").find(".answer").slideUp();

      } else {

        $(".accordion-list > li.active .answer").slideUp();
        $(".accordion-list > li.active").removeClass("active");
        $(this).addClass("active").find(".answer").slideDown();

      }
      return false;
    });

  }accordion();


  $('.m_bts button:first-child').addClass('active');
  $('.descr').hide();

  $('.m_bts button').on('click', function(){

    $(this).addClass('active');
    $(this).siblings().removeClass('active');

    let val = $(this).attr('data-value');

    $('.'+val).show();
    $('.'+val).siblings().hide();

  });

  $('.open-modal').on('click', function() {

    if($(this).hasClass('button_active')){

      $('.m_bts button').removeClass('active');
      $('.descr').hide();

      $('.m_bts button:first-child').addClass('active');
      $('.tec').show();

    }

  });


  $('.drop').click(function(){
    $('ul.sub-menu').toggleClass('active');
  });

  $('ul.sub-menu').mouseleave(function(){
    $(this).removeClass('active');
  });

  $(document).on('scroll', () => {
    let opacity
    const max_blur = 4
    let path = '/homologacao/modulados-premium/';

    if(window.location.pathname == path ){

      opacity = Math.abs(0 + ((($('.bg').offset().top - 150) - $(this).scrollTop())) / $('.bg').height())

      const blur = `blur(${Math.abs(max_blur * (($('.mod-img').offset().top - $(this).scrollTop())) / $('.mod-img').height())}px)`

      $('.bg').css('opacity', opacity)
      $('.mod-img img').css('filter'/* , blur */ )

      // console.log(blur);

    }

  });


  $('#grid .card').on('click', function(e){

    e.preventDefault();

    $(this).children("form").submit();

  });

  Fancybox.bind('[data-fancybox');

  $(window).scroll(function() {

    let larg = $(window).width();

    if (larg > 768) {

      $('.parallax').each(function(i) {

        let dt = $(this).data('parallax');
        let soma = dt / 1000;

        var scrolled = $(window).scrollTop() + $(window).height();
        let offset = $(this).offset().top;
        let scroll =  scrolled - offset;
        let value = scroll * soma;

        if(scrolled > offset){

          if(i === 1){
            $(this).css("transform", 'translateY(' + value + 'px)');
          }else{
            $(this).css("transform", 'translateY(-' + value + 'px)');
          }
        }

      });
    }

  });


});

$('div').each(function() {
  if($(this).hasClass('ex_top')){
    $('#header').addClass('ex_top');
  }
});
