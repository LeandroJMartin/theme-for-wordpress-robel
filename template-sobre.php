<?php /* Template Name: [Template] Sobre */ get_header(); ?>

<section class="about">
  <div class="row">
    <div class="col-m6 adjust-left">
      <h1 class="title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
    <div class="col-m6 adjust-right">
      <div class="wrap">
        <div class="img">
          <img class="fit" src="<?php echo get_template_directory_uri(); ?>/assets/img/empresa-01.jpeg" alt="Imagem sobre a empresa Robel"/>
        </div>
        <div class="img">
          <img class="fit" src="<?php echo get_template_directory_uri(); ?>/assets/img/empresa-02.jpeg" alt="Imagem sobre a empresa Robel"/>
        </div>
        <div class="img">
          <img class="fit" src="<?php echo get_template_directory_uri(); ?>/assets/img/empresa-03.jpeg" alt="Imagem sobre a empresa Robel"/>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

get_footer();
