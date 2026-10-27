<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<a class="site-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php bloginfo( 'name' ); ?>
	</a>

	<button class="nav-toggle" aria-expanded="false" aria-controls="primary-nav">
		<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'astravore' ); ?></span>
		<span class="nav-toggle__bar"></span>
	</button>

	<nav id="primary-nav" class="nav" aria-label="<?php esc_attr_e( 'Primary', 'astravore' ); ?>">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'nav__list',
			'fallback_cb'    => 'astravore_fallback_menu',
		) );
		?>
	</nav>
</header>
