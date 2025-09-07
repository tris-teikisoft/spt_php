<?php

namespace App\Controllers;

use PDO;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (User::loggedIn())
        {
            header("Location: /account");
            exit;
        }

        require __DIR__ . "/../Views/login.php";
    }

    public function register()
    {
        if (User::loggedIn())
        {
            header("Location: /account");
            exit;
        }

        require __DIR__ . "/../Views/register.php";
    }

    public function account()
    {
        if (!User::loggedIn())
        {
            header("Location: /login");
            exit;
        }

        require __DIR__ . "/../Views/account.php";
    }

    public function loginPost()
    {
        header("Content-Type: application/json");

        $usernameEmail = trim($_POST["username_email"]);
        $password = trim($_POST["password"]);

        // --- 1. Check if user with username/email exists ---
        $usernameEmailUserExistsStmt = $this->conn->prepare("SELECT * FROM users WHERE username = :a OR email = :b LIMIT 1;");
        $usernameEmailUserExistsStmt->execute([":a" => $usernameEmail, ":b" => $usernameEmail]);
        $user = $usernameEmailUserExistsStmt->fetch(PDO::FETCH_ASSOC);

        if (!$user)
        {
            echo json_encode([
                "error" => "user_does_not_exist"
            ]);
            return;
        }

        // --- 2. Check password ---
        if (password_verify($password, $user["password"]))
        {
            $_SESSION["user_id"] = $user["id"];
            echo json_encode([
                "success" => "logged_in"
            ]);
        }
        else
        {
            echo json_encode([
                "error" => "wrong_password"
            ]);
        }
    }

    public function registerPost()
    {
        header("Content-Type: application/json");

        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $passwordConfirmation = trim($_POST["password_confirmation"]);

        // --- 1. Check if passwords match ---
        if ($password !== $passwordConfirmation)
        {
            echo json_encode([
                "error" => "passwords_do_not_match"
            ]);
            return;
        }

        // --- 2. Check if user with specified username or email exists ---
        $usernameOrEmailExistsStmt = $this->conn->prepare("SELECT id FROM users WHERE username = :a OR email = :b LIMIT 1;");
        $usernameOrEmailExistsStmt->execute([":a" => $username, ":b" => $email]);
        $usernameOrEmailExists = (bool) $usernameOrEmailExistsStmt->fetchColumn();

        if ($usernameOrEmailExists)
        {
            echo json_encode([
                "error" => "username_email_exists"
            ]);
            return;
        }

        // --- 3. Hash password using bcrypt ---
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // --- 4. Create user ---
        $createUserStmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (:a, :b, :c);");
        $createdUser = $createUserStmt->execute([":a" => $username, ":b" => $email, ":c" => $hashedPassword]);

        if ($createdUser)
        {
            echo json_encode([
                "success" => "user_created"
            ]);
        }
        else
        {
            echo json_encode([
                "error" => "something_went_wrong"
            ]);
        }
    }

    public function logoutPost()
    {
        
    }
}