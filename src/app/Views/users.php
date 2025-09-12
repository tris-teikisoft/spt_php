<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $translations["users"] ?> - <?= $this->appName ?></title>
</head>
<body>
    <?php require __DIR__ . "/components/dashboard_nav.php"; ?>
    <main>
        <section>
            <h1><?php $translations["users"] ?></h1>
        </section>
        
        <section>
            <h2><?php $translations["users_list"] ?>:</h2>

            <?php
                if (count($users) > 0)
                {
                    echo "<ul>";
                        foreach ($users as $user)
                        {
                            echo "<li>
                                <p>{$translations['username']}: <strong>{$user['username']}</strong></p>
                                <p>{$translations['email']}: <strong>{$user['email']}</strong></p>
                                <div>
                                    <a href='/user?id={$user['id']}'>{$translations['update_user']}</a>
                                </div>
                            </li>";
                        }
                    echo "</ul>";
                }
                else
                {
                    echo "<p>{$translations['no_users']}</p>";
                }
            ?>
        </section>
    </main>
    <?php require __DIR__ . "/components/dashboard_footer.php"; ?>
</body>
</html>