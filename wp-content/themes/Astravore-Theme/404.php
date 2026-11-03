<?php get_header(); ?>

<main id="main" class="error-page">
	<p class="error-page__code">404</p>
	<h1 class="error-page__title"><?php esc_html_e( 'Lost in the dark', 'astravore' ); ?></h1>
	<p class="error-page__text">
		<?php esc_html_e( 'The moonlight does not reach this page. It may have been moved, or it never existed.', 'astravore' ); ?>
	</p>
	<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'astravore' ); ?></a>
</main>

<?php get_footer(); ?>
