<?php
  require_once('usuario.class.php');

  Class Servidor extends Usuario{

    public function __construct($pid, $pnome, $prg, $plogin, $psenha){
        parent::__construct($pid, $pnome, $prg, $plogin, $psenha);
    }
    
    public function inserir(){
      $conexao = parent::criarConexao();
      $sql = 'INSERT INTO servidor (nome, rg, login, senha) VALUES (:nome, :rg, :login, :senha)';
      $param = array(
        ':nome'=> $this->getNome(),
        ':rg'=> $this->getRg(),
        ':login'=> $this->getLogin(), 
        ':senha'=> $this->getSenha()
      );
      parent::prepararComando($conexao, $sql, $param);
      parent::executar($sql,$param);
    }

    public function listar(){
      $conexao = parent::criarConexao();
      $sql = 'SELECT * FROM servidor';
      $param = array(
        'id' => $this->getId(),
        ':nome'=> $this->getNome(),
        ':rg'=> $this->getRg(),
        ':login'=> $this->getLogin(), 
        ':senha'=> $this->getSenha()
      );
      $comando = parent::prepararComando($conexao, $sql, $param);
      $execute = parent::executar();
      if($execute)
        print_r($comando->fetch());
    }

    public function atualizar(){
      $conexao = parent::criarConexao();
      $sql = 'UPDATE servidor SET nome = :nome, rg = :rg, login = :login , senha = :senha WHERE idservidor = :id';
      $param = array(
        'id' => $this->getId(),
        ':nome'=> $this->getNome(),
        ':rg'=> $this->getRg(),
        ':login'=> $this->getLogin(), 
        ':senha'=> $this->getSenha()
      );
      parent::prepararComando($conexao, $sql, $param);
      parent::executar($sql, $param);
    }

    public function excluir(){
      $conexao = parent::criarConexao();
      $sql = 'DELETE FROM servidor WHERE idservidor = :id';
      $param = array(
        'id' => $this->getId()
      );
      parent::prepararComando($conexao, $sql, $param);
      parent::executar($sql, $param);
    }

  }
?>