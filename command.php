<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}

require_once __DIR__ . '/inc/class-command.php';

WP_CLI::add_command( 'ext', 'johnbillion\ext\Command' );
