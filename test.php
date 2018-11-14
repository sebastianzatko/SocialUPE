<?php
	$bytes = openssl_random_pseudo_bytes(32);
	$hash = base64_encode($bytes);

	echo $hash;

?>