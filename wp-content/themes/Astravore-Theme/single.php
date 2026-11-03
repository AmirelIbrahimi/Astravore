<?php
/**
 * Single post: a character or lore entry.
 */

get_header();
?>

<main id="main" class="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
			<header class="entry__header">
				<?php the_category( ' · ' ); ?>
				<h1 class="entry__title"><?php the_title(); ?></h1>
				<p class="entry__meta">
					<?php echo esc_html( get_the_date() ); ?>
					&middot;
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
				</p>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry__image"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>

			<div class="entry__content">
				<?php the_content(); ?>
			</div>

			<?php the_tags( '<p class="entry__tags">', ' ', '</p>' ); ?>
		</article>

		<?php
		the_post_navigation( array(
			'prev_text' => '&larr; %title',
			'next_text' => '%title &rarr;',
		) );
		?>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
