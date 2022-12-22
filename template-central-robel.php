<?php /* Template Name: [Template] Central Robel */

get_header();

while( have_posts() ) :
  the_post();

  ?>

  <section class="contacts">
    <div class="row relative h-100">
      <div class="col-g6 adjust-left">
        <div class="rm_bg-two"></div>
        <div class="tx">
          <h2><?php i18n('Central Robel'); ?></h2>
          <ul id="nav_itens">
            <li data-id="1" class="active"><a href="#"><?php i18n('SAC'); ?></a></li>
            <li data-id="2"><a href="#"><?php i18n('Políticas e Privacidade'); ?></a></li>
            <li data-id="3"><a href="#"><?php i18n('Meio Ambiente'); ?></a></li>
          </ul>
        </div>
      </div>
      <div class="col-g6 adjust-right">
        <div class=" element el-1 active">
          <div class="rm_bg"></div>
          <div class="wrap">
            <ul class="accordion-list">
              <?php

                $itens = get_field('itens_acordion');

                foreach ($itens as $item) :

                  ?>
                  <li>
                    <h3><?php echo $item['titulo_acordion']; ?></h3>
                    <div class="answer">
                      <p><?php echo $item['descricao_acordion']; ?></p>
                    </div>
                  </li>
                  <?php

                endforeach;

              ?>
            </ul>
          </div>
        </div>
        <div class=" element el-2">
          <div class="rm_bg"></div>
          <div class="wrap">
            <p><?php the_field('politicas_e_privacidade_central'); ?></p>
          </div>
        </div>
        <div class=" element el-3">
          <div class="rm_bg"></div>
          <div class="wrap">
            <p><?php the_field('meio_ambiente_central'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php

endwhile;

get_footer();
