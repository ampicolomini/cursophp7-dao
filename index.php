<?php
require_once("config.php");
//$sql = new SqL();
//$usuarios = $sql->select("select * from tb_usuarios");
//echo json_encode($usuarios);
//carrega um usuário
//$root = new Usuario();
//$root->loadById(6);
//echo $root;
//carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);
//carrega uma lista de usuario conforme o login
//$search = Usuario::search("ro");
//echo json_encode($search);
//carrega um usuario usando o login e a senha
//$usuario = new Usuario();
//$usuario->$login("ana", "1961");
//echo $usuario;
//insere um novo usuário
//$aluno = new Usuario("aluno", "novoaluno");
//$aluno->insert();
//echo $aluno;
$usuario = new Usuario();
$usuario->loadById(6);
$usuario->updte("professor", "novoprofessor");
echo $usuario;
?>