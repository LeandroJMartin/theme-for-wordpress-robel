<?php /* Template Name: [Template] Modulados */ get_header(); ?>

<div id="top_page" class="ex_top banner-page">
  <div class="wrap">
    <?php the_post_thumbnail(); ?>
  </div>
</div>

<section class="modulados">
  <div class="container">
    <div class="title">
      <h1><?php the_title(); ?></h1>
    </div>
    <p><?php the_content(); ?></p>
    <div class="wrap">
      <h4><?php i18n('Opções de cores para você escolher'); ?></h4>
      <div class="cores">
        <ul class="row middle">
          <?php

          $terms = get_terms(array(
            'taxonomy' =>'category',
            'hide_empty' => false
          ));

          foreach ($terms as $value) :

            ?>
            <li>
              <img src="<?php echo get_taxonomy_image($value->term_id); ?>" alt="<?php echo $value->name; ?>">
              <span><?php echo $value->name; ?></span>
            </li>
            <?php

          endforeach;

          ?>
        </ul>
      </div>
    </div>
    <div class="wrap">
      <h4><?php i18n('Diferenciais'); ?></h4>
      <div class="row tx">
        <div class="col-grid-g4">
          <?php the_field('conteudo_dif_1'); ?>
        </div>
        <div class="col-grid-g4">
          <?php the_field('conteudo_dif_2'); ?>
        </div>
        <div class="col-grid-g4">
          <?php the_field('conteudo_dif_3'); ?>
        </div>
        <div class="col-grid-g4">
          <?php the_field('conteudo_dif_4'); ?>
      </div>
    </div>
    <div class="bts">
      <a href="<?php echo get_site_url(); i18n('/contatos/#onde-comprar'); ?>"><?php i18n('Onde comprar'); ?></a>
      <a href="<?php echo get_site_url(); i18n('/ambientes'); ?>"><?php i18n('Ver composições'); ?></a>
      <a href="<?php echo get_site_url(); i18n('/modulos'); ?>"><?php i18n('Ver todos os modulados'); ?></a>
    </div>
  </div>
</section>

<section>
  <div class="mod-img">
    <img src="<?php the_field('imagem_conteudo'); ?>" alt="Imagem Modulados Robel">
    <div class="bg"></div>
  </div>
</section>

<section class="form-pg">
  <div class="container">
    <div class="title">
      <h1><?php i18n('Tenho interesse'); ?></h1>
    </div>
    <div class="form">
      <?php echo do_shortcode('[contact-form-7 id="44" title="Onde comprar"]'); ?>
    </div>
  </div>
</section>

<?php

get_footer();
