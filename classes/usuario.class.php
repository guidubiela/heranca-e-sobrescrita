<?php
  require_once "database.class.php";

  Class Usuario EXTENDS Database{

    private $id;
    private $nome;
    private $rg;
    private $login;
    private $senha;

    public function __construct($pid, $pnome,$prg,$plogin, $psenha){
      $this->setId($pid);
      $this->setNome($pnome);
      $this->setRg($prg);
      $this->setLogin($plogin);
      $this->setSenha($psenha);    
    }

    public function getId() {
      return $this->id;
    }
    public function setId($id) {
      $this->id = $id;
    }

    public function getNome() {
      return $this->nome;
    }
    public function setNome($nome) {
      $this->nome = $nome;
    }

    public function getRg() {
      return $this->rg;
    }
    public function setRg($rg) {
      $this->rg = $rg;
    }

    public function getLogin() {
      return $this->login;
    }
    public function setLogin($login) {
      $this->login = $login;
    }

    public function getSenha() {
      return $this->senha;
    }
    public function setSenha($senha) {
      $this->senha = $senha;
    }
  }
    
?>

	
