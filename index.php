<?php

require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//echo json_encode($usuarios);


//$id = 4;
//carrega somente um registro
//$sql = new Usuario();
//$sql->loadById($id);
//echo $sql;

//carrega a lista direta pois é uma função do tipo static
//$lista = Usuario::getList();
//echo json_encode($lista);

//carrega uma lista de usuário buscando pelo login (like)
//$usuario = "n";
//$login = Usuario::search($usuario);
//echo json_encode($login);

//carrega um usuário usando o login e a senha
//$usuario = "Maria Lima";
//$senha = "*%*%*%";
//$sql = new Usuario();
//$sql->login($usuario,$senha);
//echo $sql;

//inclui um novo usuário usando o login e a senha
/*$nome = "Alexa da Amazon";
$senha = "9848774";
$usuario = new Usuario();
$usuario->insert($nome,$senha);
echo $usuario;*/

//faz atualização de registro
/*$nome = "Lucas da Silva 3";
$senha = "977115";
$id = 10; 
$usuario = new Usuario();
$usuario->loadById($id);
$usuario->update($nome,$senha);
echo $usuario;*/

//faz exclusão de registro
$id = 2; 
$usuario = new Usuario();
$usuario->loadById($id);
$usuario->delete();
echo $usuario;


?>