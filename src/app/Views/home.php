<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $translations["home"] ?> - <?= $this->appName ?></title>
</head>
<body>
    <?php require __DIR__ . "/components/header.php"; ?>
    <main>
        <?php
            if (isset($_SESSION["logout_message"]))
            {
                echo "<p>{$_SESSION['logout_message']}</p>";
                unset($_SESSION["logout_message"]);
            }
        ?>
        <h1><?= $translations["home"] ?></h1>
    </main>
    <?php require __DIR__ . "/components/footer.php"; ?>
</body>
</html>