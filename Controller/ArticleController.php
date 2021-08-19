<?php

declare(strict_types = 1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class ArticleController

{
    public function index()

    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        require_once 'config.php';
        require_once 'Classes/DatabaseManager.php';

        // prepare the database connection
//        var_dump($config['password']);
        $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
        $databaseManager->connect();


        // TODO: fetch all articles as $rawArticles (as a simple array)
        $sql = "SELECT * FROM articles";
        $result = $databaseManager->connection->query($sql)->fetchAll();
        $rawArticles = $result;

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

//    public function show()
//    {
//        // TODO: this can be used for a detail page
//    }
}