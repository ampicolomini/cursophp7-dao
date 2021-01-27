<?php
require_once("config.php");
//$sql = new SqL();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);
/*Carrega um usuário
$root = new Usuario();
$root->loadById(6);
echo $root;
*/
/*Carrega uma lista de usuários
$lista = Usuario::getList();
echo json_encode($lista);
*/
/*Carrega uma lista de usuario conforme o login
$search = Usuario::search("ro");
echo json_encode($search);
*/
/*carrega um usuario usando o login e a senha
$usuario = new Usuario();
$usuario->$login("ana", "1961");
echo $usuario;
*/
/*Insere um novo usuário
$aluno = new Usuario("aluno", "novoaluno");
$aluno->insert();
echo $aluno;
*/
/*Alterar usuario
$usuario = new Usuario();
$usuario->loadById(10);
$usuario->update("professor", "novoprofessor");
echo $usuario;
*/
//Deleta um usuario
$usuario = new Usuario();
$usuario->loadById(10);
$usuario->delete();
echo $usuario;
?>