<?php 

$text = $_POST["text"] ?? "";
$signature = $_POST["signature"] ?? "";
$public_key = $_POST["public_key"] ?? "";

$is_valid = openssl_verify($text, base64_decode($signature), base64_decode($public_key));

if ($is_valid === false) {
    echo "Error has occured...";
} else if ($is_valid === 1) {
    echo "Signature is valid!";
} else {
    echo "Signature is invalid :(";
}

?>