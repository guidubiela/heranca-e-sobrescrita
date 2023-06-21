<?php
  require_once('usuario.class.php');

  Class Aluno extends Usuario{

      private $turma;

      public function __construct($pid, $pnome, $prg, $plogin, $psenha, $pturma){
          $this->setTurma($pturma);
          parent::__construct($pid, $pnome, $prg, $plogin, $psenha);
      }

      public function getTurma() {
        return $this->turma;
      }
      public function setTurma($turma) {
        $this->turma = $turma;
      }

      public function inserir(){
        $conexao = parent::criarConexao();
        $sql = 'INSERT INTO aluno (nome, rg, login, senha, turma) VALUES (:nome, :rg, :login, :senha, :turma)';
        $param = array(
          ':nome'=>$this->getNome(),
          ':rg'=>$this->getRg(),
          ':login'=>$this->getLogin(), 
          ':senha'=>$this->getSenha(),
          ':turma'=>$this->getTurma()
        );
        parent::prepararComando($conexao, $sql, $param);
        parent::executar($sql,$param);
      }

      public function listar(){
        $conexao = parent::criarConexao();
        $sql = 'SELECT * FROM aluno';
        $param = array(
          'id' => $this->getId(),
          ':nome'=> $this->getNome(),
          ':rg'=> $this->getRg(),
          ':login'=> $this->getLogin(), 
          ':senha'=> $this->getSenha(),
          ':turma'=> $this->getTurma()
        );
        $comando = parent::prepararComando($conexao, $sql, $param);
        $execute = parent::executar();
        if($execute)
          print_r($comando->fetch());
      }

      public function atualizar(){
        $conexao = parent::criarConexao();
        $sql = 'UPDATE aluno SET nome = :nome, rg = :rg, login = :login , senha = :senha, turma = :turma WHERE idaluno = :id';
        $param = array(
          'id' => $this->getId(),
          ':nome'=> $this->getNome(),
          ':rg'=> $this->getRg(),
          ':login'=> $this->getLogin(), 
          ':senha'=> $this->getSenha(),
          ':turma'=> $this->getTurma()
        );
        parent::prepararComando($conexao, $sql, $param);
        parent::executar($sql, $param);
      }

      public function excluir(){
        $conexao = parent::criarConexao();
        $sql = 'DELETE FROM aluno WHERE idaluno = :id';
        $param = array(
          'id' => $this->getId()
        );
        parent::prepararComando($conexao, $sql, $param);
        parent::executar($sql, $param);
      }

  }

?>