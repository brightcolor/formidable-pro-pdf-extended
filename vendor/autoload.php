<?php

/**
 * Lightweight PSR-4 autoloader for bundled dependencies.
 * This repository vendors dependency sources directly.
 */

$fppdf_psr4 = array(
	'Mpdf\\'                     => __DIR__ . '/mpdf/mpdf/src/',
	'Mpdf\\PsrHttpMessageShim\\' => __DIR__ . '/mpdf/psr-http-message-shim/src/',
	'Mpdf\\PsrLogAwareTrait\\'   => __DIR__ . '/mpdf/psr-log-aware-trait/src/',
	'DeepCopy\\'                 => __DIR__ . '/myclabs/deep-copy/src/DeepCopy/',
	'Psr\\Http\\Message\\'       => __DIR__ . '/psr/http-message/src/',
	'Psr\\Log\\'                 => __DIR__ . '/psr/log/src/',
	'setasign\\Fpdi\\'           => __DIR__ . '/setasign/fpdi/src/',
);

spl_autoload_register(
	static function ( $class ) use ( $fppdf_psr4 ) {
		foreach ( $fppdf_psr4 as $prefix => $base_dir ) {
			$len = strlen( $prefix );
			if ( strncmp( $prefix, $class, $len ) !== 0 ) {
				continue;
			}

			$relative = substr( $class, $len );
			$file     = $base_dir . str_replace( '\\', '/', $relative ) . '.php';

			if ( file_exists( $file ) ) {
				require_once $file;
				return true;
			}
		}

		return false;
	}
);

require_once __DIR__ . '/mpdf/mpdf/src/functions.php';
require_once __DIR__ . '/myclabs/deep-copy/src/DeepCopy/deep_copy.php';
