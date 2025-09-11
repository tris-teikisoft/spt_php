<?php
    $lang = $_SESSION["lang"] ?? "en";
    $translations = require __DIR__ . "/../../lang/{$lang}.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $translations["dashboard"] ?> - <?= $this->appName ?></title>
</head>
<body>
    <?php require __DIR__ . "/components/dashboard_nav.php"; ?>
    <main>
        <h1><?= $translations["dashboard"] ?></h1>
    </main>
    <?php require __DIR__ . "/components/dashboard_footer.php"; ?>
</body>
</html>