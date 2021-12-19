<?php
if (!function_exists('str_decrypt')) {
	function str_decrypt($str = '')
	{
		$password = "sipeco";
		$base_64 = base64_decode($str);
		$ssl_decr = openssl_decrypt($base_64, "AES-128-ECB", $password);
		return $ssl_decr;
	}
}

if (!function_exists('str_encrypt')) {
	function str_encrypt($str = '')
	{
		$password = "sipeco";
		$ssl_enc = openssl_encrypt($str, "AES-128-ECB", $password);
		$base_64 = base64_encode($ssl_enc);
		return $base_64;
	}
}
if (!function_exists('seo_url_encode')) {
	function seo_url_encode($text, $id)
	{
		$eid = str_encrypt($id);
		$seo = preg_replace('/[^\w]+/', '-', strtolower($text));
		$seo .= "-eid-$eid";
		return $seo;
	}
}
if (!function_exists('seo_url_decode')) {
	function seo_url_decode($text)
	{
		$eid = explode('-eid-', $text)[1];
		return str_decrypt($eid);
	}
}
