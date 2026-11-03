<?php
/**
 * The character's photo (featured image), or a big question mark when there is none.
 * Pass the image size with: get_template_part( 'template-parts/character-image', null, array( 'size' => 'large' ) )
 */

$size = isset( $args['size'] ) ? $args['size'] : 'medium_large';

if ( has_post_thumbnail() ) :
	the_post_thumbnail( $size );
else :
	?>
	<span class="image-placeholder" aria-hidden="true">?</span>
	<?php
endif;
