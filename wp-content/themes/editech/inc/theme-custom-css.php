<?php
/**
 * @return string
 */
function editech_custom_css() {

	$css = <<<CSS
CSS;
	/**
	 * Filters Editech custom colors CSS.
	 *
	 * @param string $css Base theme colors CSS.
	 *
	 * @since Editech 1.0
	 *
	 */
	$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
	$css = str_replace( ': ', ':', $css );
	$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );

	return apply_filters( 'editech_theme_customizer_css', $css );
}