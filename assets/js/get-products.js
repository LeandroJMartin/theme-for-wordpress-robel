$(document).ready(function() {

  let array_imagens = [];
  let current = 1;

  function get_images_products(cat){

    $.ajax({
        type: "post",
        dataType: "json",
        url: load_ajax.ajax,
        data: {

          action: 'funcao_que_recebe_os_dados',
          category: cat

        },
        success: function(res){

          if (res) {
            current = 1;
            array_imagens = [...res];
            create_gallery(res);
          };

          dots_gallery();

        }
    });
  }

  function create_gallery(res){

      let array_imagens = res;
      let current = 1;

      // OBSERVER
      const target_esq = document.querySelector('#img_prev');
      const target_center = document.querySelector('#produtosHome');
      const target_dir = document.querySelector('#img_next');

      let observer = new MutationObserver(mutations => {
          mutations.forEach(mutation => {
              if (mutation.type === 'childList') {

                  let node = mutation.addedNodes[0];

                  setTimeout(() => {
                      $(node).addClass('visible');
                  }, 50)
              }
          });
      });

      const obs_config = { childList: true };

      if(target_esq){
        observer.observe(target_esq, obs_config);
      }
      if(target_center){
        observer.observe(target_center, obs_config);
      }
      if(target_dir){
        observer.observe(target_dir, obs_config);
      }
      // OBSERVER

      function update_photo() {
        $('#img_prev').empty();
        $('#produtosHome').empty();
        $('#img_next').empty();

        let prev, next;

        if (array_imagens.length > 1) {
          prev = current === 0 ? array_imagens[array_imagens.length - 1].img : array_imagens[current - 1].img
          next = current === array_imagens.length - 1 ? array_imagens[0].img : array_imagens[current + 1].img
        }

        if (prev) $(target_esq).html(`<div class="container_img"><img src="${prev}" class="img" /></div>`);

        if ($(window).width() < 576){
          $(target_center).html(`<div class="container_img"><img src="${array_imagens.length === 1 ? array_imagens[0].img : array_imagens[current].img}" class="img" /></div>`);
        } else {
          $(target_center).html(`<div class="container_img"><a href="${array_imagens.length === 1 ? array_imagens[0].url : array_imagens[current].url}"><img src="${array_imagens.length === 1 ? array_imagens[0].img : array_imagens[current].img}" class="img" /></a></div>`);
        }

        if (next) $(target_dir).html(`<div class="container_img"><img src="${next}" class="img" /></div>`);
      }update_photo();


      function att_gallery(acao){

        if (acao === 'prev'){
          if (current === 0){
              current = array_imagens.length - 1;
          } else {
              current--;
          }

          $(target_esq).children('.container_img').removeClass('visible');
          $(target_esq).children('.container_img').addClass('off');

          $(target_center).children('.container_img').removeClass('visible');
          $(target_center).children('.container_img').addClass('off');

          $(target_dir).children('.container_img').removeClass('visible');
          $(target_dir).children('.container_img').addClass('off');

          setTimeout(() => {
              update_photo();
          }, 150);

        };

        if (acao === 'next'){
            if (current > array_imagens.length - 2){
                current = 0;
            } else {
                current++;
            }

            $(target_esq).children('.container_img').removeClass('visible');
            $(target_esq).children('.container_img').addClass('off');

            $(target_center).children('.container_img').removeClass('visible');
            $(target_center).children('.container_img').addClass('off');

            $(target_dir).children('.container_img').removeClass('visible');
            $(target_dir).children('.container_img').addClass('off');

            setTimeout(() => {
                update_photo();
            }, 150);
        };

        dots_gallery(current);

    };


    $('.esq').on('click', function(){
        att_gallery('prev');
    });

    $('.dir').on('click', function(){
        att_gallery('next');
    });

    let width = $(window).width();

    if(width < 576){
      interact('#produtosHome').draggable({
          listeners: {
              end (event) {
                  let left = $('#produtosHome').offset().left;

                  const nPos = left - event.rect.left;

                  if ( nPos < -8 ) {
                      att_gallery('prev');
                  }

                  if ( nPos > 8 ) {
                      att_gallery('next');
                  }
              }
          },
      });
    }
  }

  $('#category a').on('click', function(e){

    e.preventDefault();
    const el = $(this);

    $('#category a').css({'color' : '#6d6e71'})
    el.css({'color' : '#a42026'})

    let cat = el.data('category');

    let getUrl = $('.urlBt').attr('href');
    let url = getUrl.substring(0, getUrl.lastIndexOf('/') + 1);
    $('.urlBt').attr('href', url + cat);

    get_images_products(cat)

  });

  $('#s_category').change(function(){

    const el = $(this).val();

    let getUrl = $('.urlBt').attr('href');
    let url = getUrl.substring(0, getUrl.lastIndexOf('/') + 1);
    $('.urlBt').attr('href', url + el);

    get_images_products(el)

  });

  get_images_products('armarios');

  function dots_gallery(current = 1){

    $('#dots_mob span').text(
      `${current === 0 ? array_imagens.length : current} - ${array_imagens.length}`
    )
    if(current === 0){
      $('#dots_mob .progress p').css('width', '100%');
    }else {
      $('#dots_mob .progress p').css('width', `${current / array_imagens.length * 100}%`);
    }

  }dots_gallery();

});
