<?php
    class Database{
        
        public function criarConexao() {
            try{
                $path = '../config.inc.php';
                if (file_exists($path))
                require_once($path);
                $path = '../../config.inc.php';
                if (file_exists($path))
                require_once($path);
                $conexao = new PDO(MYSQL_DNS, MYSQL_USUARIO, MYSQL_SENHA);
                return $conexao;
            }
            catch(PDOException $e){
                echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
            }
        }

        public function prepararComando($conexao, $sql, $param) {
            try{
                $comando = $conexao->prepare($sql);
                foreach($param as $chave=>$valor){
                    $comando->bindValue($chave, $valor);
                }
                return $comando;
            }
            catch(PDOException $e){
                echo "Erro ao executar o comando de inserção ". $e->getMessage();
            }
        }

        public function executar($sql, $param) {
            $conexao = $this->criarConexao();
            $comando = $this->prepararComando($conexao, $sql, $param);
            return $comando->execute();
        }
        
        public function inserir() {
            $conexao = $this->criarConexao();
            $sql = 'INSERT INTO usuario (nome, rg, login, senha) VALUES (:nome, :rg, :login, :senha)';
            $param = array(
                ':nome' => $nome,
                ':rg' => $rg,
                ':login' => $login,
                ':senha' => $senha
            );
            $this->prepararComando($conexao, $sql, $param);
            $this->executar();
        }
    
        public function listar(){
            $conexao = $this->criarConexao();
            $sql = 'SELECT * FROM usuario';
            $comando = $this->prepararComando($conexao, $sql, $param);
            $execute = $this->executar();
            if($execute)
                print_r($comando->fetch());
        }

        public function atualizar(){
            $conexao = $this->criarConexao();
            $sql = 'UPDATE usuario SET nome = :nome, rg = :rg, login = :login , senha = :senha WHERE idusuario = :id';
            $param = array(
                'id' => $id,
                ':nome' => $nome,
                ':rg' => $rg,
                ':login' => $login,
                ':senha' => $senha
            );
            $this->prepararComando($conexao, $sql, $param);
            $this->executar();
        }

        public function excluir(){
            $conexao = $this->criarConexao();
            $sql = 'DELETE FROM usuario WHERE idusuario = :id';
            $param = array(
                ':id' => $id
            );
            $this->prepararComando($conexao, $sql, $param);
            $this->executar();
        }

    }
?>