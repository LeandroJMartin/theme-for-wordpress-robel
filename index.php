<?php /* Template Name: [Template] Home */

get_header();
get_template_part( 'template-parts/banner-home');

?>

<section class="block-1">
  <div class="container ex_top">

   <ul id="category" class="desk">
     <li><a href="#" data-category="armarios"><?php i18n('Armários'); ?></a></li>
     <li><a href="#" data-category="cabeceiras"><?php i18n('Cabeceiras'); ?></a></li>
     <li><a href="#" data-category="camas"><?php i18n('Camas'); ?></a></li>
     <li><a href="#" data-category="comodas"><?php i18n('Cômodas'); ?></a></li>
     <li><a href="#" data-category="mesas-de-cabeceira"><?php i18n('Mesas de cabeceira'); ?></a></li>
     <li><a href="#" data-category="buffet"><?php i18n('Buffet'); ?></a></li>
   </ul>

   <select id="s_category" class="mobi">
     <option value="armarios"><?php i18n('Armários'); ?></option>
     <option value="cabeceiras"><?php i18n('Cabeceiras'); ?></option>
     <option value="camas"><?php i18n('Camas'); ?></option>
     <option value="comodas"><?php i18n('Cômodas'); ?></option>
     <option value="mesas-de-cabeceira"><?php i18n('Mesas de cabeceira'); ?></option>
     <option value="buffet"><?php i18n('Buffet'); ?></option>
   </select>

   <div class="row">
     <div class="cat-1 relative">
       <div class="bg-1"></div>
       <div id="img_prev" class="esq"></div>
     </div>
     <div class="cat-2">
       <p id="msg"></p>
       <div id="produtosHome" class="center"></div>
       <div id="dots_mob">
        <div class="progress"><p></p></div><span></span>
       </div>
     </div>
     <div class="cat-3 relative">
       <div id="img_next" class="dir"></div>
       <div class="bg-2"></div>
       <a class="bt urlBt" href="<?php echo get_site_url(); ?>/armarios"><?php i18n('Veja todos'); ?></a>
     </div>
   </div>
  </div>
</section>

<section class="block-2">
  <div class="container">
    <div class="row" >
      <div class="col-m6 col-last order-1">
        <div class="img">
          <img class="fit" src="<?php the_field('imagem_bloco_1_h'); ?>" alt="Modulados Premium">
        </div>
        <div class="ex-1"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/textura-2.jpg" alt="imagem background"></div>
      </div>
      <div class="col-m6 col-first mar-ex order-2 parallax" data-parallax="80">
        <div class="wrap">
          <div class="ex-2"></div>
          <div class="wraper row between rm_bg-two">
            <h1><?php i18n('Modulados Premium'); ?></h1>
            <p><?php the_field('descricao_bloco_1_h'); ?></p>
            <a class="bt" href="<?php echo get_site_url(); ?>/modulados-premium"><?php i18n('Veja todos'); ?></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-mobi">
      <div class="col-m6 col-last parallax" data-parallax="90">
        <div class="wrap">
          <div class="wraper row between rm_bg-two">
            <h1><?php i18n('Catálogo'); ?></h1>
            <p><?php the_field('descricao_bloco_2_h'); ?></p>
            <div class="link">
              <?php

              $arq = get_field('catalogo_bloco_2_h');

              ?>
              <a class="bt" href="<?php echo $arq['url']; ?>" download="<?php echo $arq['filename']; ?>"><?php i18n('Baixe o catálogo'); ?></a>
              <a class="bt" href="<?php echo get_site_url(); ?>/contatos"><?php i18n('Onde comprar'); ?></a>
            </div>
          </div>
          <div class="ex-1 ex-1-2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/textura-2.jpg" alt="imagem background"></div>
        </div>
      </div>
      <div class="col-m6 col-first mar-ex">
        <div class="ex-2 ex-2-2"></div>
        <div class="img">
          <img class="fit" src="<?php the_field('imagem__bloco_2_h'); ?>" alt="Modulados Premium">
        </div>
      </div>
    </div>
  </div>
</section>

<?php

get_footer();
