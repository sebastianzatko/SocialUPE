<?php
	$bytes = openssl_random_pseudo_bytes(32);
	$hash = base64_encode($bytes);
	$result = substr($hash, 0, 5);
	echo $result;

?>