<?php
set_include_path('./vendor/rsa');
include 'Crypt/AES.php';
include 'Crypt/Random.php'; 
include 'Crypt/RSA.php';

$rsa = new Crypt_RSA();
extract($rsa->createKey());
$rsa->loadKey($publickey); // public key

$plaintext = '..adsasdasdxzcxzc.';

//$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_OAEP);
$ciphertext = $rsa->encrypt($plaintext);
$rsa1 = new Crypt_RSA();
//cho "sdfsd";
//echo $privatekey."bnm";
$rsa1->loadKey($privatekey); // private key
echo $rsa1->decrypt($ciphertext."d");

?>