<?php

namespace App\Controllers;

use PDO;
use Config\Connection;

class Controller
{
    protected string $appName;
    protected PDO $conn;

    public function __construct()
    {
        $this->appName = $_ENV["APP_NAME"] ?? 'SPT PHP';
        $this->conn = Connection::getInstance();
    }
}