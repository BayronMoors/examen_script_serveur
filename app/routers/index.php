<?php  
/**
 * 
 *  ./app/routers/index.php
 * 
 */



if(isset($_GET['post'])){
    include_once "../app/routers/post.php";
}
else if (isset($_GET['categorie'])) {
    include_once "../app/routers/categorie.php";
}