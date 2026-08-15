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

// Root-relative path (no scheme/host) so assets still resolve even when the
// WordPress siteurl/home option doesn't match the domain this is served on.
$theme_relative_path = str_replace( wp_normalize_path( untrailingslashit( ABSPATH ) ), '', wp_normalize_path( __DIR__ ) );
$base_uri            = '/' . trailingslashit( ltrim( $theme_relative_path, '/' ) ) . 'html/';

$mockup = str_replace( 'href="style.css"', 'href="' . esc_url( $base_uri . 'style.css' ) . '"', $mockup );
$mockup = str_replace( 'src="assets/', 'src="' . esc_url( $base_uri . 'assets/' ), $mockup );

// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static local design mockup, not user input; temporary placeholder removed in Phase 2.
echo $mockup;
