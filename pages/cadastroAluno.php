<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro</title>
</head>
<?php
    $path = '../config.inc.php';
    if (file_exists($path))
    require_once($path);
    $path = '../../config.inc.php';
    if (file_exists($path))
    require_once($path);

    function findById($id){
        $conexao = new PDO(MYSQL_DNS, MYSQL_USUARIO, MYSQL_SENHA);
        $conexao = $conexao->query("SELECT * FROM aluno WHERE idaluno = $id;");
        $result = $conexao->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
   
    if($acao == 'editar') {
        $id = isset($_GET['id']) ? $_GET['id'] : ''; 
        $dados = findById($id);
    }
?>
<body>
    <div class="row">
        <div class="col-12">
            <form action="acao/acaoAluno.php" method="post">
                <legend>Cadastrar aluno</legend>
                <div class="row">
                    <div class="col-4"><label for="ID">ID:</label></div>
                    <div class="col-8"><input type="text" name="id" value="<?php if($acao == "editar") echo $dados["idaluno"]; else echo 0; ?>" readonly></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="nome">Nome:</label></div>
                    <div class="col-8"><input type="text" name="nome" id="nome" value="<?php if($acao == "editar") echo $dados["nome"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="rg">RG:</label></div>
                    <div class="col-8"><input type="text" name="rg" id="rg" value="<?php if($acao == "editar") echo $dados["rg"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="login">Login:</label></div>
                    <div class="col-8"><input type="text" name="login" id="login" value="<?php if($acao == "editar") echo $dados["login"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="senha">Senha:</label></div>
                    <div class="col-8"><input type="text" name="senha" id="senha" value="<?php if($acao == "editar") echo $dados["senha"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"><label for="turma">Turma:</label></div>
                    <div class="col-8"><input type="text" name="turma" id="turma" value="<?php if($acao == "editar") echo $dados["turma"]; ?>"></div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><button type="submit" name="acao" id="acao" value="<?php if($acao == "editar") echo "editar"; else  echo "salvar";?>">Enviar</button></div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>