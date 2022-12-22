<?php /* [Template] 404 */ get_header(); ?>

<section>
	<div class="container">
			<div class="error-404">
					<h1 class="page-title"><?php i18n('Oops!'); ?></h1>
					<h3><?php i18n('Essa página não pode ser encontrada.'); ?></h3>
					<p><?php i18n('Parece que nada foi encontrado neste local.'); ?></p>
					<div class="bt-404">
						<a href="<?php echo get_site_url(); ?>" ><div class="btn"><?php i18n('Voltar a Home'); ?></div></a>
					</div>
			</div>
	</div>
</section>

<?php

get_footer();
