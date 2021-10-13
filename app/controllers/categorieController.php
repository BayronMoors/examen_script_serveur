<?php 
/**
 * 
 *  ./app/controllers/categorieController.php
 * 
 */
namespace App\Controllers\CategorieController;
use App\Models\CategorieModel;

/**
 * listAction function
 *
 * @param \PDO $conn
 * @param array $data
 * @return void
 */
function listAction(\PDO $conn, array $data){
    include_once "../app/models/categorieModel.php";
    $posts = CategorieModel\findPostByCategorieId($conn, $data);

    GLOBAL $content, $title;
    $title = $data['title'];
    ob_start();
        include "../app/views/posts/index.php";
    $content = ob_get_clean();
}