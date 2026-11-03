<?php
/**
 * Tag archive: all posts with a given tag.
 */

get_header();
?>

<main id="main" class="archive-page">
	<header class="archive-page__header">
		<p class="archive-page__eyebrow"><?php esc_html_e( 'Tag', 'astravore' ); ?></p>
		<h1 class="section__title"><?php single_tag_title(); ?></h1>
		<?php the_archive_description( '<div class="archive-page__description">', '</div>' ); ?>
	</header>

	<?php get_template_part( 'template-parts/post-grid' ); ?>
</main>

<?php get_footer(); ?>
