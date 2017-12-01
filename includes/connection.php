<?php
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=andhra_magazine','root','123');
}
catch(PDOException $e)
{
  exit('Database error.');
}