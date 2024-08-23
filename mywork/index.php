<?php

require_once __DIR__ . '/vendor/autoload.php';

use iScale\Manager\NewsManager;
use iScale\Manager\CommentManager;
use iScale\DB\DB;

// Init database connection
$db = DB::getInstance();

// Init NewsManager and CommentManager with the database
$newsManager = NewsManager::getInstance($db);
$commentManager = CommentManager::getInstance($db);

// Fetch news with comments
foreach ($newsManager->listNews() as $news) {
    echo "############ HIRE ME PLZ -- NEWS " . $news->getTitle() . " ############\n";
    echo $news->getBody() . "\n";

    foreach ($commentManager->listComments() as $comment) {
        if ($comment->getNewsId() === $news->getId()) {
            echo "Comment " . $comment->getId() . " : " . $comment->getBody() . "\n";
        }
    }
}

$comments = $commentManager->listComments();
