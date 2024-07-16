<?php

class Usuario
{
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro; 	

	public function getIdusuario()
	{
		return $this->idusuario;
	}

	public function setIdusuario($value)
	{
		$this->idusuario = $value;
	}

	public function getDeslogin()
	{
		return $this->deslogin;
	}

	public function setDeslogin($value)
	{
		$this->deslogin = $value;
	}

	public function getDessenha()
	{
		return $this->dessenha;
	}

	public function setDessenha($value)
	{
		$this->dessenha = $value;
	}

	public function getDtcadastro()
	{
		return $this->dtcadastro;
	}

	public function setDtcadastro($value)
	{
		$this->dtcadastro = $value;
	}

	
	public function setDados($dados) 
	{
		
		if (count($dados) > 0)
		{
			$this->setIdusuario($dados["idusuario"]);
			$this->setDeslogin($dados["deslogin"]);
			$this->setDessenha($dados["dessenha"]);
			$this->setDtcadastro(new DateTime($dados["dtcadastro"]));
		}
		else
		{
			throw new Exception("Login e/ou senha inválido");
			
		}
	}

	public function loadById($id)
	{
		$sql = new Sql;
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));
		$this->setDados($results[0]);
	}

	public function login($login,$senha)
	{
		$sql = new Sql;
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(":LOGIN"=>$login,":PASSWORD"=>$senha));
		$this->setDados($results[0]);

	}


	public static function getList()
	{
		$sql = new Sql;
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

	}

	public static function search($login)
	{
		$sql = new Sql;
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :LOGIN ORDER BY deslogin", 
			array(":LOGIN"=>"%".$login."%"));

	}

	public function insert($login,$password)
	{
		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql;
		
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			":LOGIN"=>$this->getDeslogin(),":PASSWORD"=>$this->getDessenha()));

		$this->setDados($results[0]);

	}

	public function update($login,$password)
	{
		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql;
		
		$results = $sql->select("CALL sp_usuarios_update(:ID, :LOGIN, :PASSWORD)", array(
			":ID"=>$this->getIdusuario(),":LOGIN"=>$this->getDeslogin(),":PASSWORD"=>$this->getDessenha()));

		$this->setDados($results[0]);
	}

	public function delete()
	{
		$sql = new Sql;
		
		$sql->select("CALL sp_usuarios_delete(:ID)", array(
			":ID"=>$this->getIdusuario()));
	}


	public function __toString()
	{
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}

}
?>