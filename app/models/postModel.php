<?php 
/**
 * 
 *  ./app/models/postModel.php
 * 
 */
 namespace App\Models\PostModel;

 /**
  * findAll function
  *
  * @param \PDO $conn
  * @return array
  */
 function findAll(\PDO $conn):array{
     $sql="SELECT *
           FROM posts
           ORDER BY created_at
           LIMIT 10;";
     $rs = $conn->query($sql);
     return $rs->fetchAll(\PDO::FETCH_ASSOC);
 }

 /**
  * findOneById function
  *
  * @param \PDO $conn
  * @param array $data
  * @return array
  */
 function findOneById(\PDO $conn, array $data):array{
    $sql="SELECT *
          FROM posts
          WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":id", $data['id'], \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
 }