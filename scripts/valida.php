<?php session_start();

require "conn.php";

$id = $_SESSION['id'];

$bd = new PDO($dsnw, $userw, $passw, $optPDO);
$stm = $bd->prepare("SELECT * FROM usuarios WHERE id = :id");
$stm->execute(array(
    ':id' => $id
));

$usuario = $stm->fetch();
