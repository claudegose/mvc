<?php

declare(strict_types = 1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class HomepageController
{
    public function index()
    {
        // Usually, any required data is prepared here
        // For the home, we don't need to load anything

        // Load the view
        require 'View/home.php';
    }
}