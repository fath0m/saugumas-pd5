<?php

$public_key = $_POST["public_key"];
$private_key = $_POST["private_key"];
$text = $_POST["text"];

openssl_sign($text, $signature, $private_key);
?>

<h1>Signature created</h1>

<p>
    <?= base64_encode($signature) ?>
</p>

<form action="http://localhost:1338" method="post">
    <input name="public_key" value="<?= base64_encode($public_key) ?>" hidden />
    <input name="text" value="<?= $text ?>" hidden />
    <input name="signature" value="<?= base64_encode($signature) ?>" hidden />


    <button type="submit">Send over to the middleman</button>
</form>
