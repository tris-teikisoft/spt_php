<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $translations["users"] ?> - <?= $this->appName ?></title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="/js/user.js"></script>
</head>
<body>
    <?php require __DIR__ . "/components/dashboard_nav.php"; ?>

    <main>
        <section>
            <h1><?= $translations["users"] ?></h1>
        </section>
        
        <section>
            <h2><?= $translations["user"] ?>:</h2>

            <p><?php $translations["username"] ?>: <strong><?= $user["username"] ?></strong></p>
            <p><?php $translations["email"] ?>: <strong><?= $user["email"] ?></strong></p>
        </section>

        <section>
            <h3><?php $translations["current_roles"] ?>:</h3>

            <ul>
                <?php
                    foreach ($currentUserRoles as $role)
                    {
                        echo "<li>
                            <strong>{$role['name']}</strong>
                            <div>
                                <form class='del-role-form'>
                                    <input type='hidden' name='role_id' value='$role[role_id]'>
                                    <input type='hidden' name='user_id' value='$role[user_id]'>
                                    
                                    <button type='submit'>{$translations['delete_role']}</button>
                                </form>
                            </div>
                        </li>";
                    }
                ?>
            </ul>
            
            <div>
                <div>
                    <h3><?php $translations["add_new_role"] ?></h3>
                </div>

                <form id="role-form">
                    <input type="hidden" name="user_id" value="<?= $user["id"] ?>">

                    <div>
                        <label for="role_id"><?php $translations["role"] ?>:</label>
                        <select name="role_id" id="role_id">
                            <?php 
                                foreach ($roles as $role)
                                {
                                    echo "<option value='{$role["id"]}'>{$role['name']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    
                    <button type="submit"><?php $translations["add_role"] ?></button>
                </form>
            </div>
        </section>
    </main>

    <?php require __DIR__ . "/components/dashboard_footer.php"; ?>

    <div id="page-success"></div>
    <div id="page-error"></div>
</body>
</html>