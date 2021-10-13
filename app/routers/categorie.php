<?php 
/**
 * 
 *  ./app/routers/categorie.php
 * 
 */
use App\Controllers\CategorieController;

 switch ($_GET['categorie']) {
     case 'list':
        include_once "../app/controllers/categorieController.php";
        CategorieController\listAction($conn, [
            "id" => $_GET['categorieID'],
            "title" => $_GET['categorieTitle']
        ] );
        break;
 }