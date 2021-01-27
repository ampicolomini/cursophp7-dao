<?php
class Usuario{
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;
    public function getIdusuario(){
        return $this->idusuario;
    }
    public function setIdusuario($value){
        $this->idusuario = $value;
    }
    public function getDeslogin(){
        return $this->deslogin;
    }
    public function setDeslogin($value){
        $this->deslogin = $value;
    }
    public function getDessenha(){
        return $this->dessenha;
    }
    public function setDessenha($value){
        $this->dessenha = $value;
    }
    public function getDtcadastro(){
        return $this->dtcadastro;
    }
    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }
    public function loadById($id){
        $sql = new SqL();
        $results = $sql->select("select * from tb_usuarios where idusuario = :ID", array(
            ":ID"=>$id));
        if (count($results) > 0) {
            $this->setData($results[0]);
        }
    }
    public function getList(){
        $sql = new SqL();
        return $sql->select("select * from tb_usuarios order by deslogin");
    }
    public function search($Login){
        $sql = new SqL();
        return $sql->select("select * from tb_usuarios where deslogin like :SEARCH order by deslogin", array(
            ':SEARCH'=>"%".$login."%"));
    }
    public function login($Login, $password){
        $sql = new SqL();
        $results = $sql->select("select * from tb_usuarios where deslogin = :LOGIN and dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));
        if (count($results) > 0) {
            $this->setData($results[0]);            
        } else{
            throw new Exception("Login e/ou senha inválidos");
        }
    }
    public function setData($data) {
        $this->setUsuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
    }
    public function insert(){
        $sql = new SqL();
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha()
        ));
        if (count($results) > 0) {
            $this->setData($results[0]);
        }
    }
    public function update($Login, $password){
        $this->setDeslogin($login);
        $this->setDessenha($password);
        $sql = new SqL();
        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha(),
            ':ID'=>$this->getIdusuario()
        ));

    }
    public function __construct($Login = "", $password = ""){
        $this->setDeslogin($login);
        $this->setDessenha($password);
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

?>