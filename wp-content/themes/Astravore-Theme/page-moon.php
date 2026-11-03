<?php
/**
 * Page template for the page with the slug "moon" (template hierarchy: page-{slug}.php).
 * Shows the page's own content, followed by a detailed entry for every moonsign.
 */

$placeholder = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh dolor, condimentum nec elit a, malesuada venenatis ex. Phasellus lacinia placerat faucibus.';

$moonsigns = array(
	array( 'name' => 'Sun',             'class' => 'sun',             'total' => '15', 'storage' => '10',    'output' => '5' ),
	array( 'name' => 'Full Moon',       'class' => 'full',            'total' => '8',  'storage' => '4',     'output' => '4' ),
	array( 'name' => 'Waning Gibbous',  'class' => 'waning-gibbous',  'total' => '5',  'storage' => '2',     'output' => '3' ),
	array( 'name' => 'Waxing Gibbous',  'class' => 'waxing-gibbous',  'total' => '5',  'storage' => '3',     'output' => '2' ),
	array( 'name' => 'Third Quarter',   'class' => 'third-quarter',   'total' => '3',  'storage' => '1',     'output' => '2' ),
	array( 'name' => 'First Quarter',   'class' => 'first-quarter',   'total' => '3',  'storage' => '2',     'output' => '1' ),
	array( 'name' => 'Waning Crescent', 'class' => 'waning-crescent', 'total' => '2',  'storage' => '1',     'output' => '1' ),
	array( 'name' => 'Waxing Crescent', 'class' => 'waxing-crescent', 'total' => '2',  'storage' => '1',     'output' => '1' ),
	array( 'name' => 'New Moon',        'class' => 'new',             'total' => '?',  'storage' => 'Empty', 'output' => 'None' ),
);

get_header();
?>

<main class="moon-page">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="moon-page__intro">
			<h1 class="section__title"><?php the_title(); ?></h1>
			<div class="intro__text">
				<?php the_content(); ?>
			</div>
		</header>
	<?php endwhile; ?>

	<div class="moonsign-list">
		<?php
		foreach ( $moonsigns as $sign ) :
			// Each moonsign has a category with the same name (slug e.g. "full-moon").
			$category = get_category_by_slug( sanitize_title( $sign['name'] ) );
			?>
			<section class="moonsign">
				<span class="moon moon--<?php echo esc_attr( $sign['class'] ); ?>" aria-hidden="true"></span>
				<div class="moonsign__body">
					<h2 class="moonsign__name">
						<?php if ( $category ) : ?>
							<a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $sign['name'] ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $sign['name'] ); ?>
						<?php endif; ?>
						<span class="moonsign__total"><?php echo esc_html( $sign['total'] ); ?></span>
					</h2>
					<p class="moonsign__stats">
						<span><?php esc_html_e( 'Storage', 'astravore' ); ?>: <?php echo esc_html( $sign['storage'] ); ?></span>
						<span><?php esc_html_e( 'Output', 'astravore' ); ?>: <?php echo esc_html( $sign['output'] ); ?></span>
					</p>
					<p class="moonsign__text"><?php echo esc_html( $placeholder ); ?></p>
					<?php if ( $category ) : ?>
						<a class="moonsign__link" href="<?php echo esc_url( get_category_link( $category ) ); ?>">
							<?php
							/* translators: %d: number of characters with this moonsign */
							echo esc_html( sprintf( _n( 'View %d character', 'View %d characters', $category->count, 'astravore' ), $category->count ) );
							?>
						</a>
					<?php endif; ?>
				</div>
			</section>
		<?php endforeach; ?>
	</div>
</main>

<?php get_footer(); ?>
