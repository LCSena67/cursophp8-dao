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
$usuario = "Maria Lima";
$senha = "*%*%*%";
$sql = new Usuario();
$sql->login($usuario,$senha);
echo $sql;

?>