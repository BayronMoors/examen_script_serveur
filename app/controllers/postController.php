<?php
/**
 * 
 *  ./app/controllers/postController.php
 * 
 */
namespace App\Controllers\PostController;
use App\Models\PostModel;

/**
 * indexAction function
 * 
 * @param \PDO $conn
 * @return void
 */
 function indexAction(\PDO $conn){
    include_once "../app/models/postModel.php";
    $posts = PostModel\findAll($conn);

    GLOBAL $content, $title;
    $title = "Blog";
    ob_start();
        include "../app/views/posts/index.php";
    $content = ob_get_clean();
 }

 /**
  * showAction function
  *
  * @param \PDO $conn
  * @param array $data
  * @return void
  */
 function showAction(\PDO $conn, array $data){
    include_once "../app/models/postModel.php";
    $post = PostModel\findOneById($conn, $data);

    GLOBAL $content, $title;
    $title = $data['title'];
    ob_start();
        include "../app/views/posts/show.php";
    $content = ob_get_clean();
 }


 function addedAction(\PDO $conn){
    GLOBAL $content, $title;
    $title = "Add a post";
    ob_start();
        include "../app/views/posts/form.php";
    $content = ob_get_clean();
 }