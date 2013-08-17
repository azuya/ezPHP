<?php
namespace ez\core;
use ez\config as config;

/*
 *	ez HTML utility class
 */

class html {

	// JS function to include javascript in footer
	public static function js($filename, $echo=true){
		$data = "\t" . '<script src="' . config::js() . $filename . '"></script>' . "\n";
		if($echo) {
			echo $data;
		} else {
			return $data;
		}
	}

	// CSS function to include stylesheets in header
	public static function css($filename, $echo=true){
		$data = "\t" . '<link rel="stylesheet" href="' . config::css() . $filename . '">' . "\n";
		if($echo) {
			echo $data;
		} else {
			return $data;
		}
	}
	
	// Breadcrumbs function
	public static function breadcrumbs(){
		$crumbs = '';
		$url = array_filter(explode('/', $_SERVER['REQUEST_URI']), 'strlen');
		if(is_array($url) && count($url)){
			// Initialize crumbs nav
			$crumbs .= '<nav class="breadcrumbs">';
			$bits = false;
			foreach($url as $k => $crumb){
				// Add crumb
				$crumbs .= '<a href="/' . ($bits ? $bits : '') . $crumb . '/">' . $crumb . '</a>';
				$bits .= $crumb . '/';
			}
			$crumbs .= '</nav>';
		}
		echo $crumbs;
	}
	
}