<section class="banner-home">

  <div id="slide" class="owl-carousel owl-theme">

    <?php

      $banner = new WP_Query(array(
        'post_type' => 'banner_home',
        'posts_per_poge' => -1
      ));

      $count = 0;

      while( $banner->have_posts() ) :
        $banner->the_post();

        $count++;

        $img_desk = get_field('imagem_desktop_benner');
        $img_mobi = get_field('imagem_mobile_benner');
        $descr    = get_field('breve_descricao_banner');

        $class = (empty($img_mobi)) ? '' : 'desk';

        ?>

        <div class="item relative" data-dot="<button><?php echo $count < 10 ? '0'.$count : $count; ?></button>">

          <img class="img-banner fit <?php echo $class; ?>" src="<?php echo $img_desk; ?>" alt="Imagem banner Robel" />

          <?php 
          
            if(!empty($img_mobi)) :
            
              ?>
              <img class="img-banner fit mobi" src="<?php echo $img_mobi; ?>" alt="Imagem banner Robel" />
              <?php
          
            endif;
            
          ?>
          <div class="row middle center cont">
            <div class="wrap tx-center">
              <h1 class="wrap_hover"><?php the_field('titulo_do_banner'); ?></h1>
              <?php
              
                if(!empty($descr)) :
                
                  ?>
                  <p><?php echo $descr; ?></p>
                  <?php

                  endif;
                  
                ?>
              <a href="<?php the_field('link_do_botao_banner'); ?>"><?php the_field('texto_do_botao_banner'); ?></a>
            </div>
          </div>
        </div>

        <?php

      endwhile;
      wp_reset_query();

    ?>

  </div>
  <a id="prev" href="#" type="button"></a>
  <a id="next" href="#" type="button"></a>

</section>
