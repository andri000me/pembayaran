<?php
include "cipher.php"; // panggil file nya
$cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
$kunci = "bismillaahirrohmaa nirrohiim"; // kunci
?>