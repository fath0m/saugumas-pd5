<?php

$private_key = "";
$public_key = "";

if (isset($_GET["generate"]) && $_GET["generate"] == 1) {
    $res = openssl_pkey_new([
        "private_key_bits" => 1024,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ]);

    openssl_pkey_export($res, $private_key);

    $public_key = openssl_pkey_get_details($res);
    $public_key = $public_key["key"];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSA Signature</title>
</head>
<body>
    <h1>
        RSA Signature
    </h1>

    <form method="get">
        <input name="generate" value="1" hidden />
        <button>
            Generate public / private key pairs
        </button>
    </form>

    <br />

    <form action="/sign.php" method="post">
        <label for="public_key">
            Public key
        </label>

        <textarea style="width:100%;" rows="10" name="public_key" id="public_key" required><?= $public_key ?></textarea>

        <br />
        <br />

        <label for="private_key">
            Private key key
        </label>

        <textarea style="width:100%;" rows="10" name="private_key" id="private_key" required><?= $private_key ?></textarea>

        <br />
        <br />

        <label for="text">
            Text to sign
        </label>

        <textarea style="width:100%;" rows="10" name="text" id="text" required></textarea>

        <br />
        <br />

        <button type="submit">Sign</button>

    </form>
</body>
</html>

