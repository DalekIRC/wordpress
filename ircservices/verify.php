<?php
require_once($_SERVER['DOCUMENT_ROOT']."/wp-load.php");
global $wp_hasher;
$pass = base64_decode($_GET['pass']);
$hash = base64_decode($_GET['hash']);
if (empty($wp_hasher))
{
	require_once ABSPATH . WPINC . '/class-phpass.php';
	$wp_hasher = new PasswordHash( 8, true );
}
$v = $wp_hasher->CheckPassword($pass,$hash);
printf(json_encode(array('verify' = $v)));