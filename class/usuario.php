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
       
        $this->setData($results[0]); 
           
    }  
    }
    
    public static function getList(){
        $sql=new Sql();
        return $sql->select("select * from tb_usuarios order by deslogin;");
    }
    
    public static function search($login){
        $sql=new Sql();
        return $sql->select("select *from tb_usuarios where deslogin Like :SEARCH order by deslogin",array(
            ':SEARCH'=>"%".$login."%"
        ));
    } 
    
    public function login($login, $password){
        $sql=new Sql();
        $results=$sql->select("select * from tb_usuarios where deslogin = :LOGIN and dessenha = :PASSWORD", array(
        ":LOGIN"=>$login,
        ":PASSWORD"=>$password
            
    ));
    
    if (count($results)>0){
        
        $this->setData($results[0]);        
        
           
    } else {
        throw new Exception("Login e/ou senha inválidos.");
    } 
    }
    public function setData($data){
        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtCadastro(new DateTime($data['dtcadastro']));
    }
    public function insert(){
        $sql = new Sql();
        $results=$sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha()
        ));
        if (count($results)>0){
            $this->setData($results[0]);
        }
    }
    public function update($login, $password){
        $this->setDeslogin($login);
        $this->setDessenha($password);
       //echo "Novo login: ".$login."<br>Nova senha: ".$password."<br>";
                
        $sql = new SQL();
        $sql->Query("update tb_usuarios set deslogin = :LOGIN, dessenha=:PASSWORD where idusuario=:ID", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha(),
            ':ID'=>$this->getIdusuario()
        ));
    }
    
    public function __construct($login="",$password="") {
        $this->setDeslogin($login);
        $this->setDessenha(($password));
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

