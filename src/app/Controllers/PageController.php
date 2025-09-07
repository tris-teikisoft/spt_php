<?php

namespace App\Controllers;

class PageController extends Controller
{
    public function home()
    {
        require __DIR__ . "/../Views/home.php";
    }

    public function about()
    {
        require __DIR__ . "/../Views/about.php";
    }

    public function contact()
    {
        require __DIR__ . "/../Views/contact.php";
    }

    public function dashboard()
    {
        require __DIR__ . "/../Views/dashboard.php";
    }
}