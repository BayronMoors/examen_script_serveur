<?php  
/**
 * 
 *  ./core/utilities.php
 * 
 */

 /**
 * charLimit function
 *
 * @param string $chain
 * @param integer $limit
 * @return string
 */
function charLimit(string $chain, int $limit = TRUNCATE_LENGTH) :string
{
   $str = $chain;
   if (strlen($chain) > $limit) {
      $str = explode("\n", wordwrap($chain, $limit));
      $str = $str[0] . '...';
   }

   return  $str;
}

/**
 * datify function
 *
 * @param string $date
 * @param [type] $format
 * @return string
 */
function datify (string $date, string $format = DATE_FORMAT) :string {
    $date = new \DateTime($date);
    return $date->format($format);
 }

 /**
 * slugify function
 *
 * @param string $chain
 * @return string
 */
function slugify(string $chain) :string
{
   return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $chain)));
}

 /**
  * uploadFile function
  *
  * @param string $name
  * @param string $destination
  * @return bool
  */
  function uploadFile(string $name, string $destination, int $limit = 1000000, $permit = array('jpg', 'jpeg', 'png', 'pdf')): bool{
   $file = $_FILES[$name];
   $fileName = $file['name'];
   $fileTmpName = $file['tmp_name'];
   $fileSize = $file['size'];
   $fileError = $file['error'];
   $fileType = $file['type'];

  

   $fileExt = explode('.', $fileName);
   $fileActualExt = strtolower(end($fileExt));
  

   $allowed = $permit;

   if(in_array($fileActualExt, $allowed)){
      if ($fileError === 0) {
         if ($fileSize < $limit) {
            $fileNameNew = $fileExt[0].".".$fileActualExt;
            $fileDestination = $destination.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            return true;
         }
         else{
            echo "ton image est trop volumineuse!";
            return false;
         }
      }
      else{
         echo "Il y a une erreur lors de l'upload!";
         return false;
      }
   }
   else{
      echo "tu ne peut pas upload une image de ce type!";
      return false;
   }
 }