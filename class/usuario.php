<?php
class Usuario{
    private $id_usuario;
    private $des_login;
    private $des_senha;
    private $dt_cadastro;

    public function getIdusuario(){
        return $this->id_usuario;
    }
    public function setIdusuario($value){
        $this->id_usuario=$value;
    }
    public function getDeslogin(){
        return $this->des_login;
    }
    public function setDeslogin($value){
        $this->des_login=$value;
    }
    public function getDessenha(){
        return $this->des_senha;
    }
    public function setDessenha($value){
        $this->des_senha=$value;
    }
    public function getDtcadastro(){
        return $this->dt_cadastro;
    }
    public function setDtcadastro($value){
        $this->dt_cadastro=$value;
    }
    public function loadById($id){
        $sql=new Sql();
        $results=$sql->select("SELECT*FROM tb_usuarios WHERE id_usuario = :ID", array(":ID"=>$id));
        if (count($results)>0){
            $row = $results[0];
            $this->setIdusuario($row['id_usuario']);
            $this->setDeslogin($row['des_login']);
            $this->setDessenha($row['des_senha']);
            $this->setDtcadastro(new DateTime($row['dt_cadastro']));
        }
    }

    public function __toString(){
        return json_encode(array(
            "id_usuario"=>$this->getIdusuario(),
            "des_login"=>$this->getDeslogin(),
            "des_senha"=>$this->getDessenha(),
            "dt_cadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")));
        }
    }

?>