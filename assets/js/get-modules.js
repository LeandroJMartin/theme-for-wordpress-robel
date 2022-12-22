$(window).on('load', () => {

  let _total = {
    width: $(window).innerWidth(),
    heigth: $(window).innerHeight(),
  };

  const update_tamanhos = (w, h) => {
    if (w === _total.width && h !== _total.heigth) reoganizar('altura');
    if (w !== _total.width && h === _total.heigth) reoganizar('largura');
    if (w !== _total.width && h !== _total.heigth) reoganizar('ambos');

    if ( w !== _total.width ) _total.width = w;
    if ( h !== _total.heigth ) _total.heigth = h;

  };

  $(window).on('resize orientationchange', function(e){
    const width = $(e.target).innerWidth();
    const heigth = $(e.target).innerHeight();

    update_tamanhos(width, heigth);
  });

  const grid = document.getElementsByClassName('#mods')[0]
  //  grid.grid

  let animando = false;
  const maior_timer_animação = 700;

  // FUNCOES
  const getMetadeContainerGeral = () => {
      return $('#mods').innerWidth() / 2;
  };

  function close() {
      $(this).removeClass(['button_active', 'button_active_left', 'button_active_right', 'button_active_single']);

      setTimeout(() => {
          $(this).parent().children('.open-modal').removeClass(['button_active', 'button_active_left', 'button_active_right', 'button_active_single']);
      }, maior_timer_animação);

      const modulo_pai = $(this).parent();
      const content = modulo_pai.children('.content');

      $('.opacidade_fundo').removeClass('opacidade_active').css('zIndex', '');

      modulo_pai.removeClass('visible_center');
      modulo_pai.removeClass('visible_full');
      modulo_pai.css({
          'left': '',
      });

      content.removeClass(['visible_left', 'visible_right', 'visible_bottom', 'visible_bottom_single']);
      content.css({
          'top': '',
          'left': '',
      });

      setTimeout(() => {
          modulo_pai.css({
              'zIndex': '',
          });

          content.css({
              'zIndex': '',
          });
      }, maior_timer_animação);
  };

  const getTotalColumn = () => {

      const grid = $('#mods').css('grid');

      const column = grid.match('/(.*)/');
      const str = column.splice(0, 1).join('/');
      return str.substr(str.indexOf('/') + 1, str.lastIndexOf('x')).split(' ').filter(item => item !== "").filter(item => item !== "0px").length;

  };
  // FUNCOES

  const reset = () => {
        const modulos = $('.mod-item');
        modulos.each(function() {
            $(this).removeClass();
            $(this).addClass('mod-item');
            $(this).removeAttr('style');
        });

        const content = $('.content');
        content.each(function() {
            $(this).removeClass();
            $(this).addClass('content');
            $(this).removeAttr('style');
        });

        const button_open = $('.open-modal');
        button_open.each(function() {
            $(this).removeClass();
            $(this).addClass('open-modal');
            $(this).removeAttr('style');
        });

        $('.opacidade_fundo').removeClass('opacidade_active');
        $('.opacidade_fundo').removeAttr('style');

        $('.button_close_content_single').removeClass('button_close_content_single_active');
        $('.button_close_content_single').removeAttr('style');

        return;
    };


  const reoganizar = (medidas) => {

      if(medidas === 'largura' || medidas === 'ambos'){
        reset();
      }

      const centro_container_geral = getMetadeContainerGeral();

      const modulos_box = $('.mod-item');

      modulos_box.removeClass(['left_modulo', 'center_modulo', 'right_modulo', 'full', 'full_right']);
      $('.content').removeClass(['left', 'center', 'right', 'bottom']);

      const real_array = $.makeArray(modulos_box);

      let array_partes = [];
      let copia_real_array = real_array.slice(0, real_array.length);

      const grid = $('#mods').css('grid');

      if( grid === undefined ) return;

      const total_columns = getTotalColumn();

      $.map(real_array, (item, i) => {

          if (i % 3 === 0) {
              array_partes = copia_real_array.splice(0, 3);
          }

          const windowInnerWidth = $(window).innerWidth();

          if ( total_columns === 3 ) {
              if ( array_partes.length === 3 ) {

                  const box0Esq = $(array_partes[0]);
                  const box01Center = $(array_partes[1]);
                  const box02Dir = $(array_partes[2]);

                  if ( box01Center.offset().left > box0Esq.offset().left && box01Center.offset().left < box02Dir.offset().left ) {
                      box01Center.removeClass(['left_modulo', 'right_modulo']);
                      box01Center.children('.content').removeClass('right');
                      box01Center.addClass('center_modulo');
                  }
              }

              if ( array_partes.length === 2 ) {
                  const box01Center = $(array_partes[1]);

                  box01Center.removeClass(['left_modulo', 'right_modulo']);
                  box01Center.children('.content').removeClass('right');

                  box01Center.addClass('center_modulo');

              }

              if ( $(item).offset().left > centro_container_geral && !$(item).hasClass('center_modulo') ) {
                  $(item).addClass('right_modulo');
                  $(item).children('.content').addClass('right');
              }

              if ( $(item).offset().left < centro_container_geral && !$(item).hasClass('center_modulo') ) {
                  $(item).addClass('left_modulo');
                  $(item).children('.content').addClass('left');
              }

              if ( $(item).hasClass('center_modulo') ) {
                  $(item).children('.content').addClass('left');
              }

          } else if ( total_columns === 2 ) {

              $(item).removeClass(['left_modulo', 'center_modulo', 'right_modulo']);
              $(item).addClass('full');

              if ( $(item).offset().left > centro_container_geral ) {
                  $(item).addClass('full_right');
              }

              $(item).children('.content').removeClass(['left', 'right']);
              $(item).children('.content').addClass('bottom');

          } else if ( total_columns === 1 ) {

              $(item).removeClass(['left_modulo', 'center_modulo', 'right_modulo', 'full']);
              $(item).addClass('single');

              $(item).children('.content').addClass('bottom_single');

          } else {

              if ( $(item).offset().left > centro_container_geral && !$(item).hasClass('center_modulo') ) {
                  $(item).addClass('right_modulo');
                  $(item).children('.content').addClass('right');
              }

              if ( $(item).offset().left < centro_container_geral && !$(item).hasClass('center_modulo') ) {
                  $(item).addClass('left_modulo');
                  $(item).children('.content').addClass('left');
              }

              if ( $(item).hasClass('center_modulo') ) {
                  $(item).children('.content').addClass('left');
              }
          }
      })
  }; reoganizar();


  // BOTAO ABRIR
  $('.open-modal').on('click', function() {

      if (animando) return;

      animando = true;

      setTimeout(() => {
          animando = false;
      }, maior_timer_animação);

      if ( $(this).hasClass('button_active') ) {
          return close.call($(this));
      } else {
          $(this).addClass('button_active');

          if ( $(this).parent().hasClass('left_modulo') || $(this).parent().hasClass('center_modulo') ) {
              $(this).addClass('button_active_left');
          }

          if ( $(this).parent().hasClass('right_modulo') ) {
              $(this).addClass('button_active_right');
          }

          if ( $(this).parent().hasClass('full') || $(this).parent().hasClass('single') ) {
              $(this).addClass('button_active_single');

              $(this).parent().children('.content').children('.button_close_content_single').addClass('button_close_content_single_active');
          }
      }

      $('.opacidade_fundo').addClass('opacidade_active').css('zIndex', 97);

      const modulo_pai = $(this).parent();

      $('.content').removeClass(['visible_left', 'visible_right']);

      modulo_pai.css('zIndex', 100);

      modulo_pai.children('open-modal').css('zIndex', 99);

      const content = modulo_pai.children('.content').css('zIndex', 98);
      const gallery = modulo_pai.children('.galeria');


      if ( modulo_pai.hasClass('left_modulo') ) {

          content.addClass('visible_left');

      } else if ( modulo_pai.hasClass('center_modulo') ) {

          modulo_pai.addClass('visible_center');

          modulo_pai.css({
              left: -(modulo_pai.prev().width() + 25),
          });

          content.addClass('visible_left');

      } else if ( modulo_pai.hasClass('right_modulo') ) {

          content.addClass('visible_right');

      } else if ( modulo_pai.hasClass('full') ) {

          modulo_pai.addClass('visible_full');

          if ( modulo_pai.hasClass('full_right') )
          modulo_pai.css({
              left: -(modulo_pai.prev().width() + 25),
          });

          gallery.addClass('gallery-center');
          content.addClass('visible_bottom');

      } else {
          content.css('width', modulo_pai.width());
          content.addClass('visible_bottom_single');
      }

  });

  $('.button_close_content_single').on('click', function() {
      if (animando) return;

      animando = true;

      setTimeout(() => {
          animando = false;
      }, maior_timer_animação);

      if ( $(this).hasClass('button_close_content_single_active') ) {
          $(this).removeClass('button_close_content_single_active');
          return close.call($(this).parent());
      }

  });

});
