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