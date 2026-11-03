<?php
/**
 * The loop shared by all archive templates: card grid, pagination and empty state.
 */
?>
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
