<?php

namespace johnbillion\ext;

use WP_CLI;

/**
 * Checks the existence of PHP extensions needed to run WordPress.
 */
class Command {

	/**
	 * Checks the existence of all extensions that are either required or recommended to run WordPress.
	 *
	 * ## OPTIONS
	 *
	 * [--format=<format>]
	 * : Render output in a particular format.
	 * ---
	 * default: table
	 * options:
	 *   - table
	 *   - json
	 *   - yaml
	 *   - csv
	 * ---
	 *
	 * @when before_wp_load
	 */
	public function check( $args, $assoc_args ) {
		$extensions = array_merge( self::get_required_extensions(), self::get_recommended_extensions() );
		sort( $extensions, SORT_STRING | SORT_FLAG_CASE );
		$this->do_check( $assoc_args, $extensions, [
			'success' => 'All extensions are installed',
			'error'   => 'Some extensions are not installed',
		] );
	}

	/**
	 * Checks the existence of extensions that are required to run WordPress.
	 *
	 * ## OPTIONS
	 *
	 * [--format=<format>]
	 * : Render output in a particular format.
	 * ---
	 * default: table
	 * options:
	 *   - table
	 *   - json
	 *   - yaml
	 *   - csv
	 * ---
	 *
	 * @when before_wp_load
	 */
	public function required( $args, $assoc_args ) {
		$extensions = self::get_required_extensions();
		$this->do_check( $assoc_args, $extensions, [
			'success' => 'All required extensions are installed',
			'error'   => 'Some required extensions are not installed',
		] );
	}

	/**
	 * Checks the existence of extensions that are recommended to run WordPress.
	 *
	 * ## OPTIONS
	 *
	 * [--format=<format>]
	 * : Render output in a particular format.
	 * ---
	 * default: table
	 * options:
	 *   - table
	 *   - json
	 *   - yaml
	 *   - csv
	 * ---
	 *
	 * @when before_wp_load
	 */
	public function recommended( $args, $assoc_args ) {
		$extensions = self::get_recommended_extensions();
		$this->do_check( $assoc_args, $extensions, [
			'success' => 'All recommended extensions are installed',
			'error'   => 'Some recommended extensions are not installed',
		] );
	}

	protected function do_check( array $assoc_args, array $extensions, array $args ) {
		$installed = array_filter( $extensions, 'extension_loaded' );
		$missing   = array_diff( $extensions, $installed );
		$results   = [];
		$format    = $assoc_args['format'];
		$fields    = [
			'extension',
			'installed',
		];

		foreach ( $missing as $extension ) {
			$results[] = [
				'extension' => $extension,
				'installed' => false,
			];
		}

		foreach ( $installed as $extension ) {
			$results[] = [
				'extension' => $extension,
				'installed' => true,
			];
		}

		$formatter = new \WP_CLI\Formatter( $assoc_args, $fields );
		$formatter->display_items( $results );

		if ( empty( $missing ) ) {
			if ( 'table' === $format ) {
				WP_CLI::success( $args['success'] );
			}
		} else {
			if ( 'table' === $format ) {
				WP_CLI::error( $args['error'] );
			}
			exit( 1 );
		}
	}

	protected static function get_required_extensions() {
		return [
			'curl',
			'date',
			'dom',
			'filter',
			'ftp',
			'gd',
			'hash',
			'iconv',
			'json',
			'libxml',
			'mbstring',
			'mysqli',
			'openssl',
			'pcre',
			'posix',
			'SimpleXML',
			'sockets',
			'SPL',
			'tokenizer',
			'xml',
			'xmlreader',
			'zlib',
		];
	}

	protected static function get_recommended_extensions() {
		return [
			'exif',
			'gmagick',
			'imagick',
			'ssh2',
		];
	}

}
