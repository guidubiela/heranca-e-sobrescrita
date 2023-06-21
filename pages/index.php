<!DOCTYPE html>
<html lang="en">
<?php
    require "../config.inc.php";
?>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Principal</title>
</head>
<body>
    <br>
    <form action="" method="get">
        <input type="text" class="" name="filtro" id="filtro">
        <input type="submit" class="btn btn-secondary" value="Procurar">
    </form>
    
    <legend>Alunos</legend>

    <table class="table table-light table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>RG</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Turma</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
                $conexao = new PDO(MYSQL_DNS, MYSQL_USUARIO, MYSQL_SENHA);
                $sql = $conexao->query("SELECT * FROM aluno WHERE nome like '$filtro%'");
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$linha["idaluno"]}</td>
                            <td>{$linha["nome"]}</td>
                            <td>{$linha["rg"]}</td>
                            <td>{$linha["login"]}</td>
                            <td>{$linha["senha"]}</td>
                            <td>{$linha["turma"]}</td>
                            <td><a href='cadastroAluno.php?acao=editar&id={$linha["idaluno"]}'>Edit</a></td>
                            <td><a href='acao/acaoAluno.php?acao=deletar&id={$linha["idaluno"]}'>Delete</a></td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>

    <a href="cadastroAluno.php">Cadastro de aluno</a>

    <legend>Servidor</legend>

    <table class="table table-light table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>RG</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
                $conexao = new PDO(MYSQL_DNS, MYSQL_USUARIO, MYSQL_SENHA);
                $sql = $conexao->query("SELECT * FROM servidor WHERE nome like '$filtro%';");
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$linha["idservidor"]}</td>
                            <td>{$linha["nome"]}</td>
                            <td>{$linha["rg"]}</td>
                            <td>{$linha["login"]}</td>
                            <td>{$linha["senha"]}</td>
                            <td><a href='cadastroServidor.php?acao=editar&id={$linha["idservidor"]}'>Edit</a></td>
                            <td><a href='acao/acaoServidor.php?acao=deletar&id={$linha["idservidor"]}'>Delete</a></td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>

    <a href="cadastroServidor.php">Cadastro servidor</a>

    <legend>Professor</legend>

    <table class="table table-light table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>RG</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Matéria</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
                $conexao = new PDO(MYSQL_DNS, MYSQL_USUARIO, MYSQL_SENHA);
                $sql = $conexao->query("SELECT * FROM professor WHERE nome like '$filtro%';");
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$linha["idprofessor"]}</td>
                            <td>{$linha["nome"]}</td>
                            <td>{$linha["rg"]}</td>
                            <td>{$linha["login"]}</td>
                            <td>{$linha["senha"]}</td>
                            <td>{$linha["materia"]}</td>
                            <td><a href='cadastroProfessor.php?acao=editar&id={$linha["idprofessor"]}'>Edit</a></td>
                            <td><a href='acao/acaoProfessor.php?acao=deletar&id={$linha["idprofessor"]}'>Delete</a></td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>

    <a href="cadastroProfessor.php">Cadastro Professor</a>
</body>
</html>