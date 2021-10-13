<?php
/**
 * 
 *  ./app/models/categorieModel.php
 * 
 */

namespace App\Models\CategorieModel;

/**
 * findCategorieByPostId function
 *
 * @param \PDO $conn
 * @param integer $id
 * @return array
 */
function findCategorieByPostId(\PDO $conn, int $id):array{
    $sql="SELECT *
          FROM posts p
          JOIN categories c ON p.category_id = c.id
          WHERE p.id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":id", $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * findAll function
 *
 * @param \PDO $conn
 * @return array
 */
function findAll(\PDO $conn):array{
    $sql="SELECT c.*, count(p.id) as Nbpost
          FROM posts p
          JOIN categories c ON p.category_id = c.id
          GROUP BY c.id
          ORDER BY Nbpost ASC;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * findPostByCategorieId function
 *
 * @param \PDO $conn
 * @param array $data
 * @return array
 */
function findPostByCategorieId(\PDO $conn, array $data):array{
    $sql = "SELECT *
            FROM posts p
            where p.category_id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":id", $data['id'], \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}