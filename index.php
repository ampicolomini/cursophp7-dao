<?php
require_once("config.php");
//$sql = new SqL();
//$usuarios = $sql->select("select * from tb_usuarios");
//echo json_encode($usuarios);
$root = new Usuario();
$root->loadById(6);
echo $root;
?>