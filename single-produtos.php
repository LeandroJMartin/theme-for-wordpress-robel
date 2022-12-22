<?php /* Template Name: [Template] Produto */

get_header();

$tipo    = get_field('tipo_do_produto');
$manual  = get_field('manual_de_montagem_produto');
$galeria = get_field('imagens_produto');

?>

<section class="products">
  <div class="row middle bg">
    <div class="adjust-left">
      <div class="tx">
        <h1 class="title"><?php the_title(); ?></h1>
        <?php if(!empty(get_field('largura_item medida_1')) || !empty(get_field('altura_item medida_1')) || !empty(get_field('profundidade_item medida_1'))) : ?>
        <div class="info">
          <h3>Medidas:</h3>
          <div class="row middle w-100">
            <?php
            
              if(!empty(get_field('nome_item medida_1'))) :

                $col = 3;
              
              ?>
              <div class="col-3">
                <p><b><?php the_field('nome_item medida_1'); ?></b></p>
              </div>
              <?php
              
              else :

                $col = 4;

              endif;
            ?>
            <div class="col-<?php echo $col; ?>">
              <img class="ico-first" src="<?php echo get_template_directory_uri(); ?>/assets/img/altura.svg" alt="icone altura">
              <p><?php the_field('largura_item medida_1'); ?>mm</p>
            </div>
            <div class="col-<?php echo $col; ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/largura.svg" alt="icone altura">
              <p><?php the_field('altura_item medida_1'); ?>mm</p>
            </div>
            <div class="col-<?php echo $col; ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profundidade.svg" alt="icone altura">
              <p><?php the_field('profundidade_item medida_1'); ?>mm</p>
            </div>
          </div>
          <?php
          
            if(!empty(get_field('largura_item medida_2')) || !empty(get_field('altura_item medida_2')) || !empty(get_field('profundidade_item medida_2'))) :
            
            ?>
            <div class="row middle w-100">
              <?php
              
                if(!empty(get_field('nome_item medida_2'))) :
                
                  $col = 3;
                  
                  ?>
                  <div class="col-3">
                    <p><b><?php the_field('nome_item medida_2'); ?></b></p>
                  </div>
                  <?php
              
                else :
                  $col = 4;
                endif;

              ?>
              <div class="col-<?php echo $col; ?>">
                <img class="ico-first" src="<?php echo get_template_directory_uri(); ?>/assets/img/altura.svg" alt="icone altura">
                <p><?php the_field('largura_item medida_2'); ?>mm</p>
              </div>
              <div class="col-<?php echo $col; ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/largura.svg" alt="icone altura">
                <p><?php the_field('altura_item medida_2'); ?>mm</p>
              </div>
              <div class="col-<?php echo $col; ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profundidade.svg" alt="icone altura">
                <p><?php the_field('profundidade_item medida_2'); ?>mm</p>
              </div>
            </div>
            <?php
          
              endif;
              
          ?>
        </div>
        <?php

        endif;

        $cor = get_field('cores_do_produto');
        $decr = get_field('descricao_item_pro');

        if(empty($cor) && !empty($decr)) :

          $col = 12;

        elseif(!empty($cor) && empty($decr)) :

          $col = 12;

        else :

          $col = 6;

        endif;

      ?>

        <div class="row">
          <?php
          
            if($cor) :
            
            ?>
            <div class="col-g<?php echo $col; ?>">
              <ul class="colors">
                <h3><?php i18n('Cores:'); ?></h3>
                <?php

                  foreach ($cor as $value) :

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
            <?php
        
            endif;
            if($decr) :
            
          ?>
          <div class="col-g<?php echo $col; ?> dif">
            <h3><?php i18n('Diferenciais:'); ?></h3>
            <p><?php the_field('descricao_item_pro'); ?></p>
          </div>
          <?php
        
          endif;
        
        ?>
        </div>
        <div class="butons">
          <a class="bt" href="#"><?php i18n('Manual de montagem'); ?></a>
          <a class="bt" href="<?php echo get_site_url(); ?>/contatos/#onde-comprar"><?php i18n('Onde comprar'); ?></a>
        </div>
      </div>
    </div>
    <div class="adjust-right">
      <div class="img">
        <div class="owl-carousel owl-theme g_modulos">
          <?php

          foreach ($galeria as $imgs) :

            ?>
            <div class="item">
              <a href="<?php echo $imgs['url']; ?>" data-fancybox="gallery">
                <img class="fit" src="<?php echo $imgs['url']; ?>" alt="Imagem Produto Robel"/>
              </a>
            </div>
            <?php

          endforeach;

          ?>
        </div>
      </div>
    </div>
  </div>

  <?php

  $wp_query = new WP_Query(array(
    'post_type' => 'produtos',
    'posts_per_page' => 4,
    'order'    => 'ASC',
    'meta_query' => array(
        array(
            'key'     => 'tipo_do_produto',
            'value'   => $tipo['value'],
            'compare' => '=',
        ),
    ),
  ));

  if(have_posts()) :

  ?>
  <div class="container wrap">
    <div class="title">
      <h1><?php i18n('Produtos relacionados'); ?></h1>
    </div>
    <div class="row">
      <?php

        while( $wp_query->have_posts() ) : $wp_query->the_post();

          $gallery = get_field('imagens_produto');

          ?>
          <div class="col-grid">
            <div class="wraper">
              <a href="<?php the_permalink(); ?>">
                <img class="fit" src="<?php echo $gallery[0]['url']; ?>" alt="Imagem produto Robel" />
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

      ?>
    </div>
  </div>
<?php

  endif;

?>
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
