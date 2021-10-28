<?php
function  t_decrypt($str) {
	if (!$str) return '';
	$str = base64_decode($str);
	$bf =& get_crypt_blowfish();
	return rtrim($bf->decrypt($str));
}
$str = 'h8FGPT+pHpj7QNj/0JB7AzEVjbQVjDy1ZNgpc8UgMDk=';
$mail = t_decrypt($str);

echo $mail;

?>
