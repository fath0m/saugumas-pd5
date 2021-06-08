<?php 

$text = $_POST["text"] ?? "";
$signature = $_POST["signature"] ?? "";
$public_key = $_POST["public_key"] ?? "";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSA Signature middleman</title>
</head>
<body>
    <h1>
        RSA Signature middleman
    </h1>

    <label for="public_key">
            Public key
    </label>

    <textarea style="width:100%;" rows="10" required disabled><?= base64_decode($public_key) ?></textarea>

    <br />
    <br />

    <form action="http://localhost:1339" method="post">

        <input name="public_key" value="<?= $public_key ?>" hidden/>

        <label for="signature">
            Signature
        </label>

        <textarea style="width:100%;" rows="10" name="signature" id="signature" required><?= $signature ?></textarea>

        <br />
        <br />

        <label for="text">
            Text
        </label>

        <textarea style="width:100%;" rows="10" name="text" id="text" required><?= $text ?></textarea>

        <br />
        <br />

        <button type="submit">Send to receiver</button>

    </form>
</body>
</html>