<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
	<a class="card__image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
		<?php get_template_part( 'template-parts/character-image' ); ?>
	</a>

	<div class="card__body">
		<?php the_category( ' · ' ); ?>
		<h3 class="card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
		<?php the_tags( '<p class="tag-list">', '', '</p>' ); ?>
	</div>
</article>
