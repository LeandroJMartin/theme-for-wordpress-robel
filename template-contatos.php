<?php /* Template Name: [Template] Contatos */ get_header(); ?>

<section class="contacts">
  <div class="row relative h-100">
    <div class="col-m6 adjust-left">
      <div class="rm_bg-two"></div>
      <div class="tx">
        <h2>Contatos Robel</h2>
        <ul id="nav_itens">
          <li id="1" data-id="1" class="active"><a href="#onde-comprar"><?php i18n('Onde comprar'); ?></a></li>
          <li id="2" data-id="2"><a href="#onde-encontrar"><?php i18n('Onde encontrar'); ?></a></li>
          <li id="4" data-id="4"><a href="#sac"><?php i18n('Contato'); ?></a></li>
        </ul>
      </div>
    </div>
    <div class="col-m6 adjust-right">
      <div class=" element el-1 active">
        <div class="rm_bg"></div>
        <div class="wrap">
          <h2 class="title"><?php i18n('Onde comprar'); ?></h2>
          <?php echo do_shortcode('[contact-form-7 id="44" title="Onde comprar"]'); ?>
        </div>
      </div>
      <div class=" element el-2">
        <div class="rm_bg"></div>
        <div class="wrap">
          <h2 class="title"><?php i18n('Onde encontrar'); ?></h2>
          <?php echo do_shortcode('[contact-form-7 id="43" title="Onde encontrar"]'); ?>
        </div>
      </div>
      <div class=" element el-4 ">
        <div class="rm_bg"></div>
        <div class="wrap">
          <h2 class="title"><?php i18n('Contato'); ?></h2>
          <?php echo do_shortcode('[contact-form-7 id="5" title="Contato"]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

get_footer();
