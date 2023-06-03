<?php
$host = "localhost";
$user = "root";
$senha = "";
$banco = "crud_ebook";

$conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $senha);
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>