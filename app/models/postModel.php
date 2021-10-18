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
 function findAll(\PDO $conn, int $off):array{
     $sql="SELECT *
           FROM posts
           ORDER BY created_at DESC
           LIMIT 10 OFFSET :off;";
     $countOffSet = ($off * 10) - 10;
     $rs = $conn->prepare($sql);
     $rs->bindValue(":off", $countOffSet, \PDO::PARAM_INT);
     $rs->execute();
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

 /**
  * insertOne function
  *
  * @param \PDO $conn
  * @param array $data
  * @return int
  */
 function insertOne(\PDO $conn, array $data): int{
       $sql="INSERT INTO posts
             (title, text, created_at, quote, image, category_id)
             VALUES ( :title, :text, NOW(), :quote, :image, :category_id);";
       $rs = $conn->prepare($sql);
       $rs->bindValue(":title", $data['title'], \PDO::PARAM_STR);
       $rs->bindValue(":text", $data['text'], \PDO::PARAM_STR);
       $rs->bindValue(":quote", $data['quote'], \PDO::PARAM_STR);
       $rs->bindValue(":image", $data['image'], \PDO::PARAM_STR);
       $rs->bindValue(":category_id", $data['category_id'], \PDO::PARAM_INT);
       $rs->execute();
       return $conn->lastInsertId();
 }

 /**
  * deleteOneById function
  *
  * @param \PDO $conn
  * @param integer $id
  * @return void
  */
 function deleteOneById(\PDO $conn, int $id){
      $sql ="DELETE FROM posts
             WHERE id = :id;";
      $rs = $conn->prepare($sql);
      $rs->bindValue(":id", $id, \PDO::PARAM_INT);
      $rs->execute();
 }

  /**
  * updateOneById function
  *
  * @param \PDO $conn
  * @param array $data
  * @return void
  */
  function updateOneById(\PDO $conn, array $data){
      $sql="UPDATE posts
            SET title = :title, text = :text, quote = :quote, image = :image, category_id = :category_id
            WHERE id = :id";
      $rs = $conn->prepare($sql);
      $rs->bindValue(":title", $data['title'], \PDO::PARAM_STR);
      $rs->bindValue(":text", $data['text'], \PDO::PARAM_STR);
      $rs->bindValue(":quote", $data['quote'], \PDO::PARAM_STR);
      $rs->bindValue(":image", $data['image'], \PDO::PARAM_STR);
      $rs->bindValue(":category_id", $data['category_id'], \PDO::PARAM_INT);
      $rs->bindValue(":id", $data['id'], \PDO::PARAM_INT);
      $rs->execute();
}

/**
 * countAllPost function
 *
 * @param \PDO $conn
 * @return array
 */
function countAllPost(\PDO $conn): array{
      $sql = "SELECT count(posts.id) as count
              FROM posts;";
      $rs = $conn->query($sql);
      return $rs->fetch(\PDO::FETCH_ASSOC);
  }