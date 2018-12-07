<?php

require_once ("config.php");

/*$sql = new Sql();
$usuarios = $sql->select("select *from tb_usuarios");
echo json_encode($usuarios);
*/
/* Carrag 1 usuário
$user = new Usuario();
$user->loadById(2);
echo $user;
  */
/*Carrga uma lista de usuários
$lista=Usuario::getList();
echo json_encode($lista);
*/

/*Carrega uma lista de usuarios buscando pelo login
$search=Usuario::search("jo");
echo json_encode ($search);
*/

//Carraga um usuario usano o login e a senha
$usuario = new Usuario();
$usuario->login("root","98654");
echo $usuario;


    
