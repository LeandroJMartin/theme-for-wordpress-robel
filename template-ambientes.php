<?php /* Template Name: [Template] Ambientes */ get_header(); ?>

<section class="work">
  <div class="category-buttons cat-bts">
    <a href="#" class="active all" data-group="all"><?php i18n('todos'); ?></a>
    <a href="#" data-group="quartogrande"><?php i18n('Quarto grande '); ?></a>
    <a href="#" data-group="quartomedio"><?php i18n('Quarto médio '); ?></a>
    <a href="#" data-group="quartopequeno"><?php i18n('quarto pequeno '); ?></a>
    <a href="#" data-group="quartocasal"><?php i18n('quarto casal '); ?></a>
    <a href="#" data-group="quartosolteiro"><?php i18n('quarto solteiro '); ?></a>
    <a href="#" data-group="escritorio"><?php i18n('escritório'); ?></a>
    <a href="#" data-group="infantil"><?php i18n('infantil'); ?></a>
  </div>

  <select class="category-buttons select-cat">
    <option value="all" class="active all"><?php i18n('Todos') ?></option>
    <option value="quartogrande"><?php i18n('Quarto grande ') ?></option>
    <option value="quartomedio"><?php i18n('Quarto médio ') ?></option>
    <option value="quartopequeno"><?php i18n('quarto pequeno ') ?></option>
    <option value="quartocasal"><?php i18n('quarto casal ') ?></option>
    <option value="quartosolteiro"><?php i18n('quarto solteiro ') ?></option>
    <option value="escritorio"><?php i18n('escritório') ?></option>
    <option value="infantil"><?php i18n('infantil') ?></option>
  </select>
  <span class="text"><?php i18n('Selecione para visualizar os ambientes na categoria desejada'); ?></span>

  <div class="container wrap">
    <h1><?php i18n('Sugestão de composições'); ?></h1>
    <p><?php i18n('Clique para ver todos os modulos da composição escolhida.'); ?></p>
    <div id="grid" class="grid">

      <?php

        $wp_query = new WP_Query(array(
          'post_type' => '_ambientes',
        ));

        while( $wp_query->have_posts () ) :
          $wp_query->the_post();

          $img = get_field('a_imagem_do_ambiente');
          $categories = get_field('a_categoria');

          $cat = join(',', $categories);

          $post_slug = get_post_field( 'post_name', get_post() );

          $post_id = get_the_ID();

          ?>
          <a class="card" data-groups="<?php echo $cat; ?>">
            <img src="<?php echo $img; ?>" alt="Ambiente Robel" />
            <form class="id_ambiente" action="<?php echo get_site_url() ?>/modulos" method="post">
              <input type="hidden" name="q_ambiente" value="<?php echo $post_slug; ?>">
              <input type="hidden" name="id_ambiente" value="<?php echo $post_id; ?>">
            </form>
          </a>
          <?php

        endwhile;
        wp_reset_postdata();

        ?>
      <div class="guide"></div>
    </div>
  </div>
</section>

<section class="bt-modAll">
  <div class="container">
    <p><?php i18n('Caso queira ver todos os modulos sem nenhuma composição.'); ?></p>
    <a href="<?php echo get_site_url(); ?>/modulos"><?php i18n('Ver todos os modulados'); ?></a>
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
