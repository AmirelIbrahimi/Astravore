<?php
/**
 * Front page: hero, short intro to the world and a taste of the archive.
 */

$moonsigns = array(
	array( 'name' => 'Sun',             'class' => 'sun',              'points' => '15' ),
	array( 'name' => 'Full Moon',       'class' => 'full',             'points' => '8' ),
	array( 'name' => 'Waning Gibbous',  'class' => 'waning-gibbous',   'points' => '5' ),
	array( 'name' => 'Third Quarter',   'class' => 'third-quarter',    'points' => '3' ),
	array( 'name' => 'Waning Crescent', 'class' => 'waning-crescent',  'points' => '2' ),
	array( 'name' => 'New Moon',        'class' => 'new',              'points' => '?' ),
);

$latest = new WP_Query( array(
	'post_type'           => 'post',
	'posts_per_page'      => 3,
	'ignore_sticky_posts' => true,
) );

get_header();
?>

<main id="main">

	<section class="hero">
		<div class="hero__moon" aria-hidden="true"></div>
		<div class="hero__content">
			<p class="hero__eyebrow"><?php esc_html_e( 'A world beneath the moon', 'astravore' ); ?></p>
			<h1 class="hero__title"><?php bloginfo( 'name' ); ?></h1>
			<p class="hero__tagline">
				<?php esc_html_e( 'After a forgotten war shattered civilization, humanity rebuilds beneath the moon, wielding powers they barely understand.', 'astravore' ); ?>
			</p>
			<a class="button" href="#intro"><?php esc_html_e( 'Enter', 'astravore' ); ?></a>
		</div>
		<a class="hero__scroll" href="#intro" aria-label="<?php esc_attr_e( 'Scroll down', 'astravore' ); ?>"></a>
	</section>

	<section id="intro" class="section intro reveal">
		<h2 class="section__title"><?php esc_html_e( 'The Moon Leaves a Mark', 'astravore' ); ?></h2>
		<p class="intro__text">
			<?php esc_html_e( 'Those who receive the moon\'s light carry its phase on their body. Full or hollow, bright or barely there, the sign decides how much light a person can hold and how much of it they can bear to spend.', 'astravore' ); ?>
		</p>
		<p class="intro__text">
			<?php esc_html_e( 'And above them all, there is the Sun.', 'astravore' ); ?>
		</p>

		<ul class="moons">
			<?php foreach ( $moonsigns as $sign ) : ?>
				<li class="moons__item">
					<span class="moon moon--<?php echo esc_attr( $sign['class'] ); ?>" aria-hidden="true"></span>
					<span class="moons__name"><?php echo esc_html( $sign['name'] ); ?></span>
					<span class="moons__points"><?php echo esc_html( $sign['points'] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>

	<section class="section archive-teaser reveal">
		<h2 class="section__title"><?php esc_html_e( 'From the Archive', 'astravore' ); ?></h2>

		<?php if ( $latest->have_posts() ) : ?>
			<div class="card-grid">
				<?php
				while ( $latest->have_posts() ) :
					$latest->the_post();
					get_template_part( 'template-parts/card', 'post' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p class="archive-teaser__empty"><?php esc_html_e( 'The archive is still empty. Nothing has been written down yet.', 'astravore' ); ?></p>
		<?php endif; ?>

		<?php
		$categories = get_categories( array( 'hide_empty' => true ) );
		if ( $categories ) :
			?>
			<ul class="chips">
				<?php foreach ( $categories as $category ) : ?>
					<li><a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</section>

</main>

<?php
get_footer();
