<?php
/**
 * Archive template: used for categories (moonsigns), tags, authors and dates
 * when no more specific template exists.
 */

get_header();
?>

<main id="main" class="archive-page">
	<header class="archive-page__header">
		<h1 class="section__title"><?php the_archive_title(); ?></h1>
		<?php the_archive_description( '<div class="archive-page__description">', '</div>' ); ?>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="card-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/card', 'post' );
			endwhile;
			?>
		</div>

		<?php
		the_posts_pagination( array(
			'mid_size'  => 1,
			'prev_text' => __( 'Previous', 'astravore' ),
			'next_text' => __( 'Next', 'astravore' ),
		) );
		?>
	<?php else : ?>
		<p class="archive-page__empty"><?php esc_html_e( 'Nothing has been written down here yet.', 'astravore' ); ?></p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
