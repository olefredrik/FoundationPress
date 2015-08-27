<?php
/**
 * Protocol Relative Theme Assets
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.1.0
 */

if ( ! class_exists( 'Foundationpress_protocol_relative_theme_assets' ) ) :
	class Foundationpress_protocol_relative_theme_assets {
		/**
		 * Plugin URI: https://github.com/ryanjbonnell/Protocol-Relative-Theme-Assets
		 * Description: Transforms enqueued CSS and JavaScript theme URLs to use protocol-relative paths.
		 * Version: 1.0
		 * Author: Ryan J. Bonnell
		 * Author URI: https://github.com/ryanjbonnell
		 *
		 * Class Constructor
		 *
		 * @access  public
		 * @since   1.0
		 */
		public function __construct() {
			add_filter( 'style_loader_src', array( $this, 'style_loader_src' ), 10, 2 );
			add_filter( 'script_loader_src', array( $this, 'script_loader_src' ), 10, 2 );

			add_filter( 'template_directory_uri', array( $this, 'template_directory_uri' ), 10, 3 );
			add_filter( 'stylesheet_directory_uri', array( $this, 'stylesheet_directory_uri' ), 10, 3 );
		}

		/**
		 * Convert
		 *
		 * @access  private
		 * @return  string
		 * @since   1.0
		 */
		private function make_protocol_relative_url( $url ) {
			return preg_replace( '(https?://)', '//', $url );
		}

		/**
		 * Transform Enqueued Stylesheet URLs
		 *
		 * @access  public
		 * @return  string
		 * @since   1.0
		 */
		public function style_loader_src( $src, $handle ) {
			return $this->make_protocol_relative_url( $src );
		}

		/**
		 * Transform Enqueued JavaScript URLs
		 *
		 * @access  public
		 * @return  string
		 * @since   1.0
		 */
		public function script_loader_src( $src, $handle ) {
			return $this->make_protocol_relative_url( $src );
		}

		/**
		 * Transform Enqueued Theme Files
		 *
		 * @access  public
		 * @return  string
		 * @since   1.0
		 * @link    http://codex.wordpress.org/Function_Reference/get_template_directory_uri
		 */
		public function template_directory_uri( $template_dir_uri, $template, $theme_root_uri ) {
			return $this->make_protocol_relative_url( $template_dir_uri );
		}

		/**
		 * Transform Enqueued Theme Files
		 *
		 * @access  public
		 * @return  string
		 * @since   1.0
		 * @link    http://codex.wordpress.org/Function_Reference/get_stylesheet_directory_uri
		 */
		public function stylesheet_directory_uri( $stylesheet_dir_uri, $stylesheet, $theme_root_uri ) {
			return $this->make_protocol_relative_url( $stylesheet_dir_uri );
		}
	}

	$Foundationpress_protocol_relative_theme_assets = new Foundationpress_protocol_relative_theme_assets;
endif;

?>
