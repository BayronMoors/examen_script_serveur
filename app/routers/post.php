<?php

/**
 * 
 *  ./app/routers/post.php
 * 
 */

use App\Controllers\PostController;

switch ($_GET['post']) {
    case "index":
        include_once "../app/controllers/postController.php";
        PostController\indexAction($conn);
        break;
    case "show":
        include_once "../app/controllers/postController.php";
        PostController\showAction($conn, [
            "id" => $_GET['postID'],
            "title" => $_GET['postTitle']
        ]);
        break;
    case "added":
        include_once "../app/controllers/postController.php";
        PostController\addedAction($conn);
        break;
}
