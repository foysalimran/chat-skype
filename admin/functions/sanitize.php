<?php
/**
 * Sanitize functions for custom plugin.
 *
 * @package Your_Plugin_Name
 */

if ( ! defined( 'ABSPATH' ) ) {
    die;
} // Cannot access directly.

/**
 * Sanitize: Replace letter 'a' to letter 'b'.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @param   string $value The value to be sanitized.
 * @return  string        The sanitized value.
 */
if ( ! function_exists( 'scs_sanitize_replace_a_to_b' ) ) {
    function scs_sanitize_replace_a_to_b( $value ) {
        return str_replace( 'a', 'b', $value );
    }
}

/**
 * Sanitize title.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @param   string $value The value to be sanitized.
 * @return  string        The sanitized value.
 */
if ( ! function_exists( 'scs_sanitize_title' ) ) {
    function scs_sanitize_title( $value ) {
        return sanitize_title( $value );
    }
}
