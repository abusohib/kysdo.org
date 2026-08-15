<?php
/**
 * Temporary fallback template.
 *
 * Serves the static html/index.html mockup as-is so the theme can be
 * activated in wp-admin before the phased conversion (TRL-8 - TRL-23)
 * replaces it with a real WordPress front-page.php.
 *
 * @package KYSDO
 */

$mockup_path = __DIR__ . '/html/index.html';

if ( ! file_exists( $mockup_path ) ) {
	wp_die( esc_html__( 'Mockup file html/index.html not found.', 'kysdo-theme' ) );
}

$mockup = file_get_contents( $mockup_path );

if ( false === $mockup ) {
	wp_die( esc_html__( 'Mockup file html/index.html could not be read.', 'kysdo-theme' ) );
}

// Resolved via the WordPress template URI API so it stays correct across
// symlinked installs, multisite, and non-standard siteurl configurations.
$base_uri = trailingslashit( get_template_directory_uri() ) . 'html/';

$mockup = str_replace( 'href="style.css"', 'href="' . esc_url( $base_uri . 'style.css' ) . '"', $mockup );
$mockup = str_replace( 'src="assets/', 'src="' . esc_url( $base_uri . 'assets/' ), $mockup );

// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static local design mockup, not user input; temporary placeholder removed in Phase 2.
echo $mockup;
