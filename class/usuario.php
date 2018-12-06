<?php

class Usuario{
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function getDeslogin() {
        return $this->deslogin;
    }

    function getDessenha() {
        return $this->dessenha;
    }

    function getDtcadastro() {
        return $this->dtcadastro;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setDeslogin($deslogin) {
        $this->deslogin = $deslogin;
    }

    function setDessenha($dessenha) {
        $this->dessenha = $dessenha;
    }

    function setDtcadastro($dtcadastro) {
        $this->dtcadastro = $dtcadastro;
    }

    public function loadById($id){
    $sql=new Sql();
    $results=$sql->select("select * from tb_usuarios where idusuario = :ID", array(
        ":ID"=>$id
            
    ));
    
    if (count($results)>0){
        $row = $results[0];
        
        $this->setIdusuario($row['idusuario']);
        $this->setDeslogin($row['deslogin']);
        $this->setDessenha($row['dessenha']);
        $this->setDtCadastro(new DateTime($row['dtcadastro']));
           
    }  
    }

    public function __toString(){
    return json_encode(array(
       "idusuario"=>$this->getIdusuario(),
        "deslogin"=>$this->getDeslogin(),
        "dessenha"=>$this->getDessenha(),
        "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
    ));
    }
}

