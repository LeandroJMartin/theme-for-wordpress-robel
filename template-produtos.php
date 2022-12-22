<?php /* Template Name: [Template] Produtos */

get_header();

$request_url = $_SERVER['REQUEST_URI'];
$ex_url = explode('/', $request_url);
$url = $ex_url[2];

?>

<section class="products">
  <div class="tx tx-center" style="margin-top: 30px;">
    <h1 class="title"><?php the_title(); ?></h1>
  </div>
  <div class="row middle bg">

    <?php

      $wp_query = new WP_Query(array(
        'post_type' => 'produtos',
        'posts_per_page' => -1,
        'order'    => 'ASC',
        'meta_query' => array(
          array(
              'key'     => 'tipo_do_produto',
              'value'   => $url,
              'compare' => '=',
          ),
        ),
      ));

      while( $wp_query->have_posts() ) :
        $wp_query->the_post();

        $gallery = get_field('imagens_produto');
        $count = $wp_query->post_count;

        $rand = rand(1, $count);
        $thumb = get_the_post_thumbnail();

        if(empty($thumb)) :

          $array_img = [];

          foreach ($gallery as $value) :

            $img = $value['url'];

          endforeach;

        else :

          $img = get_the_post_thumbnail();

        endif;

      endwhile;
      wp_reset_postdata();

    ?>
  </div>

  <div class="container wrap">
    <div class="row">

      <?php

      if( have_posts() ) :

        while( $wp_query->have_posts() ) :
          $wp_query->the_post();

          $imgs = get_field('imagens_produto');

          ?>
          <div class="col-grid">
            <div class="wraper">
              <a href="<?php the_permalink(); ?>">
                <img class="fit" src="<?php echo $imgs[0]['url']; ?>" alt="Imagem produto Robel" />
                <div class="content">
                  <div class="tx">
                    <h3><?php the_title(); ?></h3>
                    <p class="bt"><?php i18n('Ver produto'); ?></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <?php

        endwhile;

      else :

        ?>

        <h4><?php i18n('Nenhum produto encontrado.'); ?></h4>

        <?php

      endif;
      wp_reset_postdata();

      ?>
    </div>
  </div>
</section>

<?php

get_footer();
