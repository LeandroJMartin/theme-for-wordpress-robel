<!doctype html>
<html <?php language_attributes(); ?>>

<head>

    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="description" content="<?php bloginfo( 'name' ); ?>">
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Maya Comunicação">
    <title><?php the_title(); ?></title>

    <!-- Facebook -->
    <meta property="og:locale" content="pt-BR" />
    <meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
    <meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
    <meta property="og:url" content="<?php echo get_site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo cts_add_theme_slug(); ?>" />
    <meta property="og:type" content="website">
    <meta property="og:image" content="assets/img/logo-do-tema.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="160">

    <!-- IOS -->
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="default"/>

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/assets/img/favicon.ico" type="image/x-icon"/>

    <!-- Google -->
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel='dns-prefetch' href='//maps.googleapis.com' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />


    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <header id="header">
    <div class="container">
      <div class="row middle">
        <div class="rm-col order-1">
          <nav>
            <ul class="row">
              <li><a href="<?php echo get_site_url(); i18n('/a-robel'); ?>"><?php i18n('A Robel'); ?></a></li>
              <li class="drop"><a href="#"><?php i18n('Produtos'); ?></a>
                <ul class="sub-menu">
                  <li><a href="<?php echo get_site_url(); i18n('/armarios'); ?>"><?php i18n('Armários'); ?></a></li>
                  <li><a href="<?php echo get_site_url(); i18n('/cabeceiras'); ?>"><?php i18n('Cabeceiras'); ?></a></li>
                  <li><a href="<?php echo get_site_url(); i18n('/camas'); ?>"><?php i18n('Camas'); ?></a></li>
                  <li><a href="<?php echo get_site_url(); i18n('/comodas'); ?>"><?php i18n('Cômodas'); ?></a></li>
                  <li><a href="<?php echo get_site_url(); i18n('/mesas-de-cabeceira'); ?>"><?php i18n('Mesas de cabeceira'); ?></a></li>
                  <li><a href="<?php echo get_site_url(); i18n('/buffet'); ?>"><?php i18n('Buffet'); ?></a></li>
                </ul>
              </li>
              <li><a href="<?php echo get_site_url(); i18n('/modulados-premium'); ?>"><?php i18n('Modulados Premium'); ?></a></li>
              <li><a href="<?php echo get_site_url(); i18n('/contatos/#onde-comprar'); ?>"><?php i18n('Onde comprar'); ?></a></li>
            </ul>
          </nav>
        </div>
        <div class="logo center order-2">
          <a href="<?php echo get_site_url(); ?>">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-robel.svg" alt="Logo Robel Móveis">
            <img class="img-white" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-robel-white.svg" alt="Logo Robel Móveis">
          </a>
          <button type="button" class="toggle">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
          </button>
        </div>
        <div class="rm-col end order-3">
          <nav>
            <ul class="row">
              <li><a href="http://187.32.169.41:8080/fv" target="_blank"><?php i18n('Sistema pedido'); ?></a></li>
              <li><a href="https://www.vdmax3d.com.br/Robel/" target="_blank"><?php i18n('VDMAX3D'); ?></a></li>
              <li><a href="<?php echo get_site_url(); ?>/contatos/#sac"><?php i18n('Quero revender'); ?></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
