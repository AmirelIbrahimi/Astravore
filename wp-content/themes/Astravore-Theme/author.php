<?php
/**
 * Author archive: all posts written by one author.
 */

$author = get_queried_object();

get_header();
?>

<main id="main" class="archive-page">
	<header class="archive-page__header">
		<?php echo get_avatar( $author->ID, 96, '', '', array( 'class' => 'archive-page__avatar' ) ); ?>
		<p class="archive-page__eyebrow"><?php esc_html_e( 'Author', 'astravore' ); ?></p>
		<h1 class="section__title"><?php echo esc_html( $author->display_name ); ?></h1>
		<?php if ( $author->description ) : ?>
			<div class="archive-page__description"><?php echo esc_html( $author->description ); ?></div>
		<?php endif; ?>
	</header>

	<?php get_template_part( 'template-parts/post-grid' ); ?>
</main>

<?php get_footer(); ?>
