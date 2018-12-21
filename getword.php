<?php

$dbhost = 'localhost:3060';
$dbuser = 'wordlyAccess';
$dbpass = 'wordlyAccess';

$con = mysql_connect($dbhost, $dbuser, $dbpass);

$q = $_REQUEST['q'];

mysql_query("SET character_set_results = 'utf8', 
          character_set_client = 'utf8', 
          character_set_connection = 'utf8', 
          character_set_database = 'utf8', 
          character_set_server = 'utf8'", $con);

if(!$con) {
  die('Could not connect: '.mysql_error());
}

switch($q) {
  case 1:
    $sql = 'SELECT * FROM `spanishNouns` ORDER BY RAND() LIMIT 0,1';  
    break;
  case 2:
    $randNum = (int) mt_rand(1,2);
    if($randNum == 1) {
      $sql = 'SELECT * FROM `spanishNouns` ORDER BY RAND() LIMIT 0,1';
    } else if($randNum == 2) {
      $sql = 'SELECT * FROM `spanishVerbs` ORDER BY RAND() LIMIT 0,1';
    }
    break;
  case 3:
    $randNum = (int) mt_rand(1,3);
    if($randNum == 1) {
      $sql = 'SELECT * FROM `spanishNouns` ORDER BY RAND() LIMIT 0,1';
    } else if($randNum == 2) {
      $sql = 'SELECT * FROM `spanishVerbs` ORDER BY RAND() LIMIT 0,1';
    } else if ($randNum == 3) {
      $sql = 'SELECT * FROM `spanishAdjectives` ORDER BY RAND() LIMIT 0,1';
    }
    break;
  case 4:
    $sql = 'SELECT * FROM `germanNouns` ORDER BY RAND() LIMIT 0,1';
    break;
  case 5:
    $randNum = (int) mt_rand(1,2);
    if($randNum == 1) {
      $sql = 'SELECT * FROM `germanNouns` ORDER BY RAND() LIMIT 0,1';
    } else if($randNum == 2) {
      $sql = 'SELECT * FROM `germanVerbs` ORDER BY RAND() LIMIT 0,1';
    }
    break;
  case 6:
    $randNum = (int) mt_rand(1,3);
    if($randNum == 1) {
      $sql = 'SELECT * FROM `germanNouns` ORDER BY RAND() LIMIT 0,1';
    } else if($randNum == 2) {
      $sql = 'SELECT * FROM `germanVerbs` ORDER BY RAND() LIMIT 0,1';
    } else if ($randNum == 3) {
      $sql = 'SELECT * FROM `germanAdjectives` ORDER BY RAND() LIMIT 0,1';
    }
    break;
  case 7:
    $sql = 'SELECT * FROM `frenchNouns` ORDER BY RAND() LIMIT 0,1'; 
    break;
  case 8:
    $randNum = (int) mt_rand(1,2);
    if($randNum == 1) {
      $sql = 'SELECT * FROM `frenchNouns` ORDER BY RAND() LIMIT 0,1';
    } else if ($randNum == 2) {
      $sql = 'SELECT * FROM `frenchVerbs` ORDER BY RAND() LIMIT 0,1';
    }
    break;
  case 9:
    $randNum = (int) mt_rand(1,3);
    if($randNum == 1) {
      $sql = 'SELECT * FROM `frenchNouns` ORDER BY RAND() LIMIT 0,1';
    } else if($randNum == 2) {
      $sql = 'SELECT * FROM `frenchVerbs` ORDER BY RAND() LIMIT 0,1';
    } else if ($randNum == 3) {
      $sql = 'SELECT * FROM `frenchAdjectives` ORDER BY RAND() LIMIT 0,1';
    }
    break;
  default:
    $sql = 'SELECT * FROM `germanNouns` ORDER BY RAND() LIMIT 0,1';
    break;
}
  
mysql_select_db('wordlyLanguages');

$result = mysql_query($sql, $con);

if(!$result) {
  die('Could not get data: '.mysql_error());
}

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $word = $row['word'];
    $article = $row['article'];
    $meaning = $row['meaning'];
}

$combo = $article." ".$word."*".$meaning;

echo $combo;

mysql_close($con);

?>