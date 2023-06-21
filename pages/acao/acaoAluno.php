<?php
     $path = '../config.inc.php';
     if (file_exists($path))
       require($path);
     $path = '../../config.inc.php';
     if (file_exists($path))
       require($path); 

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    switch ($acao) {
        case 'salvar':
            require_once "../../classes/aluno.class.php";
                
            $form = form();
            $aluno = new Aluno($form["id"], $form["nome"], $form["rg"], $form["login"], $form["senha"], $form["turma"]);
            $aluno->inserir();
            header("location:../index.php");
        break;
            
        case 'deletar':
            $path = '../../classes/aluno.class.php';
            if (file_exists($path))
            require_once($path);
            $path = '../classes/aluno.class.php';
            if (file_exists($path))
            require_once($path);
                
            $id = isset($_GET["id"]) ? $_GET["id"] : "0";
            $form = form();
            $aluno = new Aluno($id, $form["nome"], $form["rg"], $form["login"], $form["senha"], $form["turma"]);
            $aluno->excluir();
            header("location:../index.php");
        break;

        case 'editar':
            $path = '../../classes/aluno.class.php';
            if (file_exists($path))
            require_once($path);
            $path = '../classes/aluno.class.php';
            if (file_exists($path))
            require_once($path);
            
            $form = form();
            $aluno = new Aluno($form["id"], $form["nome"], $form["rg"], $form["login"], $form["senha"], $form["turma"]);
            $aluno->atualizar();
            header("location:../index.php");
        break;

    }

    function form(){
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
        $turma = isset($_POST["turma"]) ? $_POST["turma"] : "";

        $form = array(
            "id" => $id,
            "nome" => "$nome",    
            "rg" => "$rg", 
            "login" => "$login", 
            "senha" => "$senha",
            "turma" => "$turma"
        );
        return $form;
    } 
?>