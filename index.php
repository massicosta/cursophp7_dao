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

/*Carraga um usuario usano o login e a senha
$usuario = new Usuario();
$usuario->login("root","98654");
echo $usuario;
*/

/*criando um novo usuario
$aluno = new Usuario("rodrigo","senha");
$aluno->insert();

echo $aluno;
    
 */
/*comentado porque foi feito o metodo construtor e já inseriu o usuario e senha na criação do objeto
$aluno->setDeslogin("aluno"); 
$aluno->setDessenha("@lun0");
*/
$usuario = new Usuario();
$usuario->loadById(12);
$usuario -> update("rodrigo2","alterada");
echo $usuario;

