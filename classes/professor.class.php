<?php
  require_once('usuario.class.php');

  Class Professor extends Usuario{

      private $materia;

      public function __construct($pid, $pnome, $prg, $plogin, $psenha, $pmateria){
          $this->setMateria($pmateria);
          parent::__construct($pid, $pnome, $prg, $plogin, $psenha);
      }

      public function getMateria() {
        return $this->materia;
      }
      public function setMateria($materia) {
        $this->materia = $materia;
      }

      public function inserir(){
        $conexao = parent::criarConexao();
        $sql = 'INSERT INTO professor (nome, rg, login, senha, materia) VALUES (:nome, :rg, :login, :senha, :materia)';
        $param = array(
          ':nome'=> $this->getNome(),
          ':rg'=> $this->getRg(),
          ':login'=> $this->getLogin(), 
          ':senha'=> $this->getSenha(),
          ':materia'=> $this->getMateria()
        );
        parent::prepararComando($conexao, $sql, $param);
        parent::executar($sql,$param);
      }

      public function listar(){
        $conexao = parent::criarConexao();
        $sql = 'SELECT * FROM professor';
        $param = array(
          'id' => $this->getId(),
          ':nome'=> $this->getNome(),
          ':rg'=> $this->getRg(),
          ':login'=> $this->getLogin(), 
          ':senha'=> $this->getSenha(),
          ':materia'=> $this->getMateria()
        );
        $comando = parent::prepararComando($conexao, $sql, $param);
        $execute = parent::executar();
        if($execute)
          print_r($comando->fetch());
      }

      public function atualizar(){
        $conexao = parent::criarConexao();
        $sql = 'UPDATE professor SET nome = :nome, rg = :rg, login = :login , senha = :senha, materia = :materia WHERE idprofessor = :id';
        $param = array(
          'id' => $this->getId(),
          ':nome'=> $this->getNome(),
          ':rg'=> $this->getRg(),
          ':login'=> $this->getLogin(), 
          ':senha'=> $this->getSenha(),
          ':materia'=> $this->getMateria()
        );
        parent::prepararComando($conexao, $sql, $param);
        parent::executar($sql, $param);
      }

      public function excluir(){
        $conexao = parent::criarConexao();
        $sql = 'DELETE FROM professor WHERE idprofessor = :id';
        $param = array(
          'id' => $this->getId()
        );
        parent::prepararComando($conexao, $sql, $param);
        parent::executar($sql, $param);
      }

  }

?>