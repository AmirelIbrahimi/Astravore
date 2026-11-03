<?php
/**
 * Category archive: every moonsign is a category, so this lists all characters
 * with that moonsign.
 */

$term = get_queried_object();

// The moon icon classes match the category slug without "-moon" (full-moon => full).
$moon_class = str_replace( '-moon', '', $term->slug );

get_header();
?>

<main id="main" class="archive-page">
	<header class="archive-page__header">
		<span class="moon moon--<?php echo esc_attr( $moon_class ); ?> archive-page__moon" aria-hidden="true"></span>
		<p class="archive-page__eyebrow"><?php esc_html_e( 'Moonsign', 'astravore' ); ?></p>
		<h1 class="section__title"><?php single_cat_title(); ?></h1>
		<?php the_archive_description( '<div class="archive-page__description">', '</div>' ); ?>
	</header>

	<?php get_template_part( 'template-parts/post-grid' ); ?>
</main>

<?php get_footer(); ?>
