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
function indexAction(\PDO $conn, int $off = 1)
{
    include_once "../app/models/postModel.php";
    $posts = PostModel\findAll($conn, $off);

    global $content, $title, $offset;
    $offset = $off * 10;
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
function showAction(\PDO $conn, array $data)
{
    include_once "../app/models/postModel.php";
    $post = PostModel\findOneById($conn, $data);

    global $content, $title;
    $title = $data['title'];
    ob_start();
    include "../app/views/posts/show.php";
    $content = ob_get_clean();
}

/**
 * addedAction function
 *
 * @param \PDO $conn
 * @return void
 */
function addedAction(\PDO $conn)
{
    global $content, $title;
    $title = "Add a post";
    ob_start();
    include "../app/views/posts/form.php";
    $content = ob_get_clean();
}

/**
 * storeAction function
 *
 * @param \PDO $conn
 * @param array $data
 * @return void
 */
function storeAction(\PDO $conn, array $data)
{
    include_once "../app/models/postModel.php";
    if (PostModel\insertOne($conn, $data) > 0) {
        header("location: " . BASE_URL);
    } else {
        global $content;
        $content =  "Problème rencontrer";
    }
}

/**
 *  deleteAction function
 *
 * @param \PDO $conn
 * @param int $id
 * @return void
 */
function deleteAction(\PDO $conn, int $id)
{
    include_once "../app/models/postModel.php";
    PostModel\deleteOneById($conn, $id);
    header("location: " . BASE_URL);
}

/**
 * editAction function
 *
 * @param \PDO $conn
 * @param integer $id
 * @return void
 */
function editAction(\PDO $conn, int $id)
{
    include_once "../app/models/postModel.php";
    $post = PostModel\findOneById($conn, ["id" => $id]);

    global $content, $title;
    $title = "Edit a post";
    ob_start();
    include "../app/views/posts/form_edit.php";
    $content = ob_get_clean();
}

/**
 * storeAction function
 *
 * @param \PDO $conn
 * @param array $data
 * @return void
 */
function updateAction(\PDO $conn, array $data)
{
    include_once "../app/models/postModel.php";
    PostModel\updateOneById($conn, $data);
    header("location: " . BASE_URL);
}
