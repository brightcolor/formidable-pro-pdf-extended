<?php

/*
 * Add in compatibility so we don't need to rewrite all the functions from Gravity Forms into native PHP
 */
 if(!function_exists('rgpost'))
 {
	function rgpost($key)
	{
		if(isset($_POST[$key]))
		{
			return wp_unslash($_POST[$key]);
		}
		return '';
	}
 }
 
 if(!function_exists('rgget'))
 {
	function rgget($key)
	{
		if(isset($_GET[$key]))
		{
			return wp_unslash($_GET[$key]);
		}
		return '';
	}
 } 
 
 if(!function_exists('rgempty'))
 {
	function rgempty($key, $array)
	{
		if(!isset($array[$key]))
		{
			return true;	
		}
		elseif(is_scalar($array[$key]) && strlen((string) $array[$key]) == 0)
		{
			return true;	
		}
		return false;
	}
 }

?>
