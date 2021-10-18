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
    case "store":
        if(strlen($_FILES['image']["name"]) > 0){
            uploadFile("image", "./images/blog/");
            $image = $_FILES['image']["name"];
        }
        else{
            $image = "1.jpg";
        }
        include_once "../app/controllers/postController.php";
        PostController\storeAction($conn, [
            "title" => $_POST['title'],
            "text" => $_POST['text'],
            "image" => $image,
            "quote" => $_POST['quote'],
            "category_id" => $_POST['category_id']
        ]);
        break;
    case "edit":
        include_once "../app/controllers/postController.php";
        PostController\editAction($conn, $_GET['postID']);
        break;
    case "update":
        if(strlen($_FILES['image']["name"]) > 0){
            uploadFile("image", "./images/blog/");
            $image = $_FILES['image']["name"];
        }
        else{
            $image = $_POST['imageName'];
        }
            include_once "../app/controllers/postController.php";
            PostController\updateAction($conn, [
                "id" => $_GET['postID'],
                "title" => $_POST['title'],
                "text" => $_POST['text'],
                "image" => $image,
                "quote" => $_POST['quote'],
                "category_id" => $_POST['category_id']
            ]);
        break;
    case "delete":
        include_once "../app/controllers/postController.php";
        PostController\deleteAction($conn, $_GET['postID']);
        break;
    case "pagination":
        include_once "../app/controllers/postController.php";
        PostController\indexAction($conn, $_GET['postID']);
        break;
    case "previous":
            include_once "../app/controllers/postController.php";
            PostController\indexAction($conn, $_GET['postID']);
            break;
    case "next":
            include_once "../app/controllers/postController.php";
            PostController\indexAction($conn, $_GET['postID']);
        break;
}
