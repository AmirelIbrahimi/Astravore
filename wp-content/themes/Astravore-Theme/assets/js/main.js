( function () {
	// Mobile menu toggle
	var toggle = document.querySelector( '.nav-toggle' );
	var nav = document.getElementById( 'primary-nav' );

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			var open = toggle.getAttribute( 'aria-expanded' ) === 'true';
			toggle.setAttribute( 'aria-expanded', String( ! open ) );
			nav.classList.toggle( 'is-open', ! open );
		} );
	}

	// Fade sections in when they scroll into view
	var items = document.querySelectorAll( '.reveal' );

	if ( ! ( 'IntersectionObserver' in window ) ) {
		return;
	}

	// Only hide sections once we know the script can reveal them again
	document.body.classList.add( 'reveal-ready' );

	var observer = new IntersectionObserver( function ( entries ) {
		entries.forEach( function ( entry ) {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( 'is-visible' );
				observer.unobserve( entry.target );
			}
		} );
	}, { threshold: 0.15 } );

	items.forEach( function ( el ) {
		observer.observe( el );
	} );
} )();
