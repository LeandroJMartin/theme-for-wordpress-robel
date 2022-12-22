<?php /* Template Name: [Template] Modulos */ get_header();

  $q_ambiente  = $_POST['q_ambiente'];
  $id_ambiente = $_POST['id_ambiente'];

  if (!empty($id_ambiente)) :
    $titulo = 'Módulos da composição';
  else :
    $titulo = 'Todos os módulos';
  endif;

  function start_wp_query($args){

    return new WP_Query($args);

  }

  $modulados = array(
    'post_type' => 'modulados',
    'meta_query' => array(
      array(
        'key'     => 'qual_ambiente',
        'value'   => $id_ambiente,
        'compare' => 'LIKE',
      )
    ),
    'order' => 'ASC',
    'posts_per_page' => -1
  );

  $ambientes = array(
    'post_type' => '_ambientes',
    'post__in' => array($id_ambiente)
  );

  $query = start_wp_query($ambientes);

  while( $query->have_posts () ) : 
    $query->the_post();

    if ( have_posts () ) :

      ?>

      <div id="top_page" class="ex_top banner-page">
        <div class="wrap">
          <img class="fit" src="<?php the_field('a_imagem_do_ambiente'); ?>" alt="Imagem Modulado Robel">
        </div>
      </div>

      <?php

    endif;

  endwhile;
  wp_reset_query();

?>

<section class="modulos">
  <div class="container">
    <h1><?php echo $titulo; ?></h1>

    <div id="mods">
      <div class="opacidade_fundo"></div>

      <?php

      $wp_query = start_wp_query($modulados);

      while( $wp_query->have_posts () ) :
        $wp_query->the_post();

        $gallery = get_field('imagens_do_modulo');
        $colors = get_field('cores_modulos');

        ?>

        <div class="mod-item">
          <div class="galeria">
            <?php if($gallery) : ?>
            <div id="g_modulos" class="owl-carousel owl-theme g_modulos">
              <?php

              $id = get_the_ID();
              foreach ($gallery as $img) :

                ?>
                <div class="item">
                  <a href="<?php echo $img['url']; ?>" data-fancybox="gallery-<?php echo $id; ?>">
                    <img src="<?php echo $img['url']; ?>" alt="Imagem Modulo Robel">
                  </a>
                </div>
                <?php

              endforeach;

              ?>
            </div>
          <?php else : echo '<p style="margin-top:200px;">Nenhuma imagem para este módulo</p>'; endif; ?>
          </div>
          <div class="content">
            <div class="wrap">
              <div class="info row between">
                <div class="m_bts">
                  <button data-value="tec" type="button" name="button"><?php _e("Especificações Técnicas", cts_add_theme_slug()); ?></button>
                  <button data-value="descr" type="button" name="button"><?php _e("Detalhes", cts_add_theme_slug()); ?></button>
                </div>
                <div class="tx w-100">
                  <div class="tec">
                    <b><?php _e("Medidas:", cts_add_theme_slug()); ?></b>
                    <div class="row middle w-100">
                      <div class="col-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/altura.svg" alt="icone altura">
                        <p><?php the_field('m_comprimento'); ?>mm</p>
                      </div>
                      <div class="col-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/largura.svg" alt="icone altura">
                        <p><?php the_field('m_comprimento'); ?>mm</p>
                      </div>
                      <div class="col-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profundidade.svg" alt="icone altura">
                        <p><?php the_field('m_comprimento'); ?>mm</p>
                      </div>
                    </div>
                    <div class="cor-mod">
                      <?php if($colors) : ?>
                      <b>Cores:</b>
                      <ul class="row color">
                        <?php

                        foreach ($colors as $cor) :

                          ?>
                          <li>
                            <img src="<?php echo get_taxonomy_image($cor->term_id); ?>" alt="<?php echo $cor->name; ?>">
                            <span><?php echo $cor->name; ?></span>
                          </li>
                          <?php

                        endforeach;

                      endif;

                      ?>
                      </ul>
                    </div>
                  </div>
                  <div class="descr">
                    <p><?php the_field('m_descricao_geral'); ?></p>
                  </div>
                </div>
                <div class="m_bts">
                  <a class="" href="<?php echo get_site_url(); ?>/contatos/#onde-comprar"><?php _e("Onde comprar", cts_add_theme_slug()); ?></a>
                  <a class="" href="#"><?php _e("Baixar catálogo", cts_add_theme_slug()); ?></a>
                </div>
              </div>
            </div>
          </div>
          <button class="open-modal" type="button" name="button">
            <svg viewBox="0 0 31.7 58.4"><polyline fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="2.5,55.9 29.2,29.2 2.5,2.5"/></svg>
          </button>
        </div>

        <?php

        endwhile;
        wp_reset_postdata();

      ?>

    </div>
  </div>
</section>

<?php

if($id_ambiente) :

  ?>
  <section class="bt-modAll">
    <div class="container">
      <p><?php _e("Caso queira ver todos os modulos sem nenhuma composição.", cts_add_theme_slug()); ?></p>
      <a href="<?php echo get_site_url(); ?>/modulos"><?php _e("Ver todos os modulados", cts_add_theme_slug()); ?></a>
    </div>
  </section>
<?php 

  endif;
  
?>

<section class="form-pg">
  <div class="container">
    <div class="title">
      <h1><?php _e("Tenho interesse", cts_add_theme_slug()); ?></h1>
    </div>
    <div class="form">
      <?php echo do_shortcode('[contact-form-7 id="44" title="Onde comprar"]'); ?>
    </div>
  </div>
</section>

<?php

get_footer();
