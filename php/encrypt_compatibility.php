<?php 
// Compatibility information resource: https://github.com/tom--/mcrypt2openssl
function encrypt_mcrypt($msg, $key, $iv = null) {
	$pad = 16 - (strlen($msg) % 16);
	$msg .= str_repeat(chr($pad), $pad);
	if (!$iv) {
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
	}
	$encryptedMessage = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $msg, MCRYPT_MODE_CBC, $iv);
	return base64_encode($iv . $encryptedMessage);
}
function encrypt_openssl($msg, $key, $iv = null) {	
	if (!$iv) {
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-128-CBC'));
	}
	$encryptedMessage = openssl_encrypt($msg, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
	return base64_encode($iv . $encryptedMessage);
}
function decrypt_openssl($payload, $key) {
	$raw = base64_decodE($payload);
	$iv = substr($raw, 0, 16);
	$data = substr($raw, 16);
	return openssl_decrypt($data, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
}
function decrypt_mcrypt($payload, $key) {
	$raw = base64_decodE($payload);
	$iv = substr($raw, 0, 16);
	$data = substr($raw, 16);
	$result = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);
	$ctrlchar = substr($result, -1);
	$ord = ord($ctrlchar);
	if($ord < 16 && substr($result, -ord($ctrlchar)) === str_repeat($ctrlchar, $ord)) {
		$result = substr($result, 0, -ord($ctrlchar));
	}
	return $result;
}