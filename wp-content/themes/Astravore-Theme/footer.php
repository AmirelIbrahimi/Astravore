<footer class="site-footer">
	<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
		<div class="site-footer__widgets">
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
		</div>
	<?php endif; ?>

	<p class="site-footer__motto"><?php esc_html_e( 'Ashes to the wind.', 'astravore' ); ?></p>

	<?php
	wp_nav_menu( array(
		'theme_location' => 'footer',
		'container'      => false,
		'menu_class'     => 'site-footer__menu',
		'depth'          => 1,
		'fallback_cb'    => false,
	) );
	?>

	<p class="site-footer__copy">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
