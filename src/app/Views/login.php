<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $translations["login"] ?> - <?= $this->appName ?></title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="/js/login.js"></script>
</head>
<body>
    <?php require __DIR__ . "/components/header.php"; ?>
    <main>
        <h1><?= $translations["login"] ?></h1>
        <form id="login-form">
            <input type="text" name="username_email" placeholder="<?= $translations["username_email"] ?>">
            <input type="password" name="password" placeholder="<?= $translations["password"] ?>">
            <button type="submit"><?= $translations["login"] ?></button>
        </form>
        <p id="form-error"></p>
        <p id="form-success"></p>
        <a href="/register"><?= $translations["no_account_register"] ?></a>
    </main>
    <?php require __DIR__ . "/components/footer.php"; ?>
</body>
</html>